<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ImportProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import product from file.txt';

    private $file = 'http://parser-youtube.devzsg.net/file.txt';
    private $limit = 3;
    private $apikey = "AIzaSyDnQxDkQ9_VOv42KDVlsqKu6Z414hzYIWw";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lines = file($this->file);
        $bar = $this->output->createProgressBar(count($lines));
        $bar->start();
        $count = 0;
        foreach ($lines as $line_num => $line) {
            $line = trim($line);
            $check = Product::where('product_name', $line)->first();
            if($check)
                continue;

            try {
                $res_json = $this->youtube_search($this->apikey, $line, $this->limit);
                $res = json_decode($res_json);
                $product = new Product();
                $product->product_name = $line;
                $index = 0;
                if(isset($res->error))
                    dd($res->error->message);

                foreach ($res->items as $re) {
                    $index++;
                    $key_id = "link_id_$index";
                    $key_name = "link_name_$index";
                    $product->$key_id = "https://youtu.be/" . $re->id->videoId;
                    $product->$key_name = $re->snippet->title;
                }
                $product->save();
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            $bar->advance();
        }
        $bar->finish();
    }

    private function youtube_search($apikey, $search, $limit)
    {
        $search = urlencode($search);
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$search&type=video&maxResults=$limit&regionCode=RU&key=$apikey";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $out = curl_exec($ch);
        curl_close($ch);
        return $out;
    }
}
