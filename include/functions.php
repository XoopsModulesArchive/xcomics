<?php

// $Id: functions.php,v 1.1 2006/03/10 18:33:03 mikhail Exp $
class xComics
{
    // Function to build the url to image...

    public function build_image_url($method, $between, $daysback = '1', $site = '', $ext = 'gif')
    {
        if ('1' == $method) {
            $to_image = 'http://images.ucomics.com/comics/' . $between . '/' . date('Y', strtotime('-' . $daysback . ' day')) . '/' . $between . date('ymd', strtotime('-' . $daysback . ' day')) . '.gif';
        } elseif ('2' == $method) {
            $to_image = 'http://www.' . $site . '/comics/' . $between . date('Ymd', strtotime('-' . $daysback . ' day')) . '.' . $ext;
        }

        return $to_image;
    }

    // Make a loop, to get some days back...

    public function back_in_time($trytimes, $method, $between, $site = '', $ext = 'gif')
    {
        global $url_to_image;

        $i = 2;

        while ($i <= ($trytimes + 3)) {
            if ($i == ($trytimes + 2)) {
                echo 'Could not load comic. Please try again later...<br>';

                $url_to_image = '';

                break;
            }

            if (!empty($site)) {
                $url_to_image = $this->build_image_url($method, $between, $i, $site, $ext);
            } else {
                $url_to_image = $this->build_image_url($method, $between, $i);
            }

            if ($this->exists_image($url_to_image)) {
                break;
            }

            $i++;
        }
    }

    public function exists_image($url)
    {
        // Set user_agent to act like we are a real browser... ;)

        ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1) Firefox/0.9.3');

        if (true === ($fp = @fopen($url, 'rb'))) {
            fclose($fp);

            return true;
        }
  

        return false;
    }

    public function dump_image($urltoimage, $where)
    {
        $content = file_get_contents($urltoimage);

        $fp = fopen($where, 'wb');

        if (!$fp) {
            return false;
        }  

        fwrite($fp, $content);

        fclose($fp);

        return true;
    }

    public function is_it_old($file, $time)
    {
        if ((!file_exists($file)) || (($time + filemtime($file)) <= time())) {
            return true;
        }
  

        return false;
    }
}

function haakjes($wat, $xCode)
{
    if ('weghaakjes' == $wat) {
        $xCode = preg_replace('&lt;', '|lt;|', $xCode);

        $xCode = preg_replace('&gt;', '|gt;|', $xCode);

        $xCode = preg_replace('<', '&lt;', $xCode);

        $xCode = preg_replace('>', '&gt;', $xCode);
    } elseif ('terughaakjes' == $wat) {
        $xCode = preg_replace('\|lt;\|', '&amp;lt;', $xCode);

        $xCode = preg_replace('\|gt;\|', '&amp;gt;', $xCode);
    } elseif ('toonhaakjes' == $wat) {
        $xCode = preg_replace('&lt;', '<', $xCode);

        $xCode = preg_replace('&gt;', '>', $xCode);

        $xCode = preg_replace('\|lt;\|', '&lt;', $xCode);

        $xCode = preg_replace('\|gt;\|', '&gt;', $xCode);
    }

    return $xCode;
}
