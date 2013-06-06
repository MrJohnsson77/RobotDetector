<?php
/**
* The MIT License (MIT)
* 
* Copyright 2013 Christian Johnsson
*
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/

namespace RobotDetector;

class RobotDetector
{

    /**
    * Pass the useragent to check.
    * @param [string] $user_agent [User Agent String]
    * @return [integer] [returns 0 for no robot and 1 for robot]
    **/

    function RobotDetect($user_agent)
    {
        // Return if agent is common browser
        $common_browsers = "Firefox|Chrome|Opera|MSIE";
        if (preg_match("/".$common_browsers."/i", $user_agent)) return 0;

        // Get the agent
        $agent = strstr($user_agent, '/', TRUE);

        // Robots
        $robots = "abcdatos|acme-spider|ahoythehomepagefinder|Alkaline|anthill|appie|arachnophilia|arale|araneo|araybot|architext|aretha|ariadne|arks|aspider|atn|atomz|auresys|backrub|bayspider|bbot|bigbrother|bjaaland|blackwidow|blindekuh|Bloodhound|borg-bot|boxseabot|brightnet|bspider|cactvschemistryspider|calif|cassandra|cgireader|checkbot|christcrawler|churl|cienciaficcion|cmc|Collective|combine|confuzzledbot|coolbot|core|cosmos|cruiser|cusco|cyberspyder|cydralspider|desertrealm|deweb|dienstspider|digger|diibot|directhit|dnabot|download_express|dragonbot|dwcp|e-collector|ebiness|eit|elfinbot|emacs|emcspider|esculapio|esther|evliyacelebi|nzexplorer|fastcrawler|fdse|felix|ferret|fetchrover|fido|finnish|fireball|fish|fouineur|francoroute|freecrawl|funnelweb|gama|gazz|gcreep|getbot|geturl|golem|googlebot|grapnel|griffon|gromit|gulliver|gulperbot|hambot|harvest|havindex|hi|hometown|wired-digital|htdig|htmlgobble|hyperdecontextualizer|iajabot|ibm|iconoclast|Ilse|imagelock|incywincy|informant|infoseek|infoseeksidewinder|infospider|inspectorwww|intelliagent|irobot|iron33|israelisearch|javabee|JBot|jcrawler|askjeeves|jobo|jobot|joebot|jubii|jumpstation|kapsi|katipo|kdd|kilroy|ko_yappo_robot|larbin|legs|linkidator|linkscan|linkwalker|lockon|lycos|macworm|magpie|marvin|mattie|mediafox|merzscope|meshexplorer|MindCrawler|mnogosearch|moget|momspider|monster|motor|msnbot|muncher|muninn|muscatferret|mwdsearch|myweb|NDSpider|netcarta|netmechanic|netscoop|newscan-online|nhse|nomad|northstar|objectssearch|occam|octopus|OntoSpider|openfind|orb_search|packrat|pageboy|parasite|patric|pegasus|perignator|perlcrawler|phantom|phpdig|piltdownman|pimptrain|pioneer|pitkow|pjspider|pka|plumtreewebaccessor|poppi|portalb|psbot|Puu|python|raven|rbse|resumerobot|rhcs|rixbot|roadrunner|robbie|robi|robocrawl|robofox|robozilla|roverbot|rules|safetynetrobot|scooter|search_au|search-info|searchprocess|senrigan|sgscout|shaggy|shaihulud|sift|simbot|site-valet|sitetech|skymob|slcrawler|slurp|smartspider|snooper|solbot|speedy|spider_monkey|spiderbot|spiderline|spiderman|spiderview|spry|ssearcher|suke|suntek|sven|sygol|tach_bw|tarantula|tarspider|tcl|techbot|templeton|titin|titan|tkwww|tlspider|ucsd|udmsearch|uptimebot|urlck|us|valkyrie|verticrawl|victoria|visionsearch|voidbot|voyager|vwbot|w3index|w3m2|wallpaper|wanderer|wapspider|webbandit|webcatcher|webcopy|webfetcher|webfoot|webinator|weblayers|weblinker|webmirror|webmoose|webquest|webreader|webreaper|webs|websnarf|webspider|webvac|webwalk|webwalker|webwatch|wget|whatuseek|whowhere|wlm|wmir|wolp|wombat|worm|wwwc|wz101|xget|Nederland.zoek|nutch";

        // Quick check if robot
        $isRobot = (stripos($robots, $agent) === FALSE) ? 0:1;

        // If quickcheck fails to match try a slower check.
        if ($isRobot === 0) {

            $robotarray = explode('|', $robots);

            foreach ($robotarray as $key => $value) {
                $isRobot = (stripos($user_agent, $value) === FALSE) ? 0:1;
                if ($isRobot === 1) {
                    return $isRobot;
                }
            }
        }
        return $isRobot;
    }
}