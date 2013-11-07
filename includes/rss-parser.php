<?php
/**
 * Class RssParser
 *
 * @reference  http://anthonygthomas.com/2011/03/12/simple-rss-parsing-and-caching-using-php/
 */
class RssParser
{
    private $limit;

    function __construct()
    {
        $this->limit = 4;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getHtml($url)
    {
        $html = '';

        $feed = $this->getFeed($url);

        foreach($feed as $k => $v)
        {
            $html .= '<div class="feed-container"><div class="feed">'.
                     '<div class="feed-title">'.$v['title'].'</div>'.
                     '<div class="feed-description">'.$v['description'].'</div>'.
                     '<div class="feed-link"><a href="'.$v['link'].'">read more ></a></div>'.
                     '</div></div>';
        }

        return $html;
    }

    public function getFeed($url)
    {
        $i = 1;
        $xml = array();
        $doc = new DOMDocument();
        $doc->load($url);

        foreach ($doc->getElementsByTagName('item') as $node)
        {
            if($i <= $this->limit){
                $rss = array (
                    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
                );

                array_push($xml, $rss);
            }
            $i++;
        } //endforeach element ids

        return $xml;
    }
}
?>