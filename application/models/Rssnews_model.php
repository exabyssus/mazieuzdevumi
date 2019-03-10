<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * RSS news model
 */
class Rssnews_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get latest X news from TVNET RSS and cache them in the DB
     * @param int $howmany
     * @return string
     */
    public function tvnetlvRss($howmany = 5 )
    {

        $rssdbhost = $this->config->item('rssdbhost');
        $rssdbname = $this->config->item('rssdbname');
        $rssdbuser = $this->config->item('rssdbuser');
        $rssdbpass = $this->config->item('rssdbpass');
        $rssdbport = (int) $this->config->item('rssdbport');
        $rssdbprfx = $this->config->item('rssdbprfx');
        // 

        $feednetwork = new SimplePie();
        try {
            $feednetwork->set_cache_location('mysql://' . $rssdbuser . ':' . $rssdbpass . '@' . $rssdbhost . ':' . $rssdbport . '/' . $rssdbname . '?prefix=' . $rssdbprfx);
            $feednetwork->set_feed_url([$this->config->item('mainrssfeed')]);
//            $feednetwork->set_feed_url(['https://mediabox.lv/feed/']);
            $feednetwork->set_cache_duration(0); //The cache duration
            $feednetwork->get_raw_data( false ); 
            $feednetwork->force_feed(true);
            $successnetwork = $feednetwork->init(); // Initialize SimplePie
            $feednetwork->handle_content_type(); // Take care of the character encoding
        } catch (Exception $exc) {
            $successnetwork = false;
        }
 
        $htmlout = [];
        if ($successnetwork):

            $itemlimitnetwork = 0;
            $nrpk             = 0;
            foreach ($feednetwork->get_items() as $networkitem):

                ++$nrpk;
                if ($itemlimitnetwork === (int) $howmany) {
                    break;
                }
                ++$itemlimitnetwork;

                $itemlink  = $networkitem->get_permalink();
                $itemid    = thhashit($networkitem->get_date('YmdHis') . '-' . $itemlink);
                $itemtitle = $networkitem->get_title();

                $htmlout[$itemid]['id']    = $itemid;
                $htmlout[$itemid]['date']  = $networkitem->get_date('Y-m-d H:i:s');
                $htmlout[$itemid]['uri']   = $itemlink;
                $htmlout[$itemid]['title'] = $itemtitle;
 
            endforeach;

        endif;
 
        return $htmlout;
    }

}
