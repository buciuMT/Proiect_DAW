<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;


class model_carte extends Model
{
    protected $table = 'model_carte';
    protected $primaryKey = 'isbn';
    protected $keyType = 'string';
    protected $auto_increment = false;
    static function create_from_link(string $url)
    {
        $browser = new HttpBrowser(HttpClient::create());
        $browser->request('GET', $url);
        $http = $browser->getResponse();
        $crawler = new Crawler($http);
        $poza = $crawler->filter('img.w-full')->attr('src');
        $titlu = trim($crawler->filter('.text-3xl')->first()->text(), ' 🔍');
        $meta = null;
        foreach ($crawler->filter('div.mb-1') as $node) {
            if (str_contains($node->textContent, 'isbns')) {
                $meta = json_decode($node->textContent, true);
            }
        }
        $editura = trim($crawler->filter('div.text-md')->first()->text(), ' 🔍');
        $autor = trim($crawler->filter('.italic')->first()->text(), ' 🔍');
        $isbn = $meta['isbns'][0] ?? hash('md5', $titlu . $autor . $editura);
        $numar_pagini = $meta['last_page'] ?? 0;
        $photo = file_get_contents($poza);

        $path = hash('md5', $photo) . '.' . pathinfo($poza)['extension'];
        Storage::disk('public')->put($path, $photo);
        model_carte::forceCreate([
            'isbn' => $isbn,
            'titlu' => $titlu,
            'autor' => $autor,
            'editura' => $editura,
            'cover' => $path,
            'dark_cover' => $path,
            'numar_pagini' => $numar_pagini,
            'stele' => 4,
        ]);
        return $isbn;
    }
}
