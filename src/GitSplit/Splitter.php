<?php
/**
 * Created by PhpStorm.
 * User: vukanac
 * Date: 01.08.18
 * Time: 21:19
 */

namespace GitSplit;


class Splitter
{
    function split($lines)
    {
        $results = [];
        $target = 'both';
        foreach ($lines as $key => $line) {
            $skip = false;
            if (strpos($line, '<<<<<<< HEAD') === 0) {
                $target = 'head';
                $skip = true;
            }
            if (strpos($line, '=======') === 0) {
                $target = 'new';
                $skip = true;
            }
            if (strpos($line, '>>>>>>> ') === 0) {
                $target = 'both';
                $skip = true;
            }
            if (!$skip) {
                if ($target === 'both') {
                    $results['head'][] = $line;
                    $results['new'][] = $line;
                } else {
                    $results[$target][] = $line;
                }
            }
        }

        return $results;
    }
}
