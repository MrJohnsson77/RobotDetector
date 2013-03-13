<?php
/**
* Copyright 2013 Christian Johnsson
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may
* not use this file except in compliance with the License. You may obtain
* a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations
* under the License.
*/

namespace RobotDetector;

class RobotDetector
{

    /**
    * [Pass the useragent to function to check if robot]
    * @param [string] $user_agent [User Agent String]
    * @return [integer] [returns 0 is no robot and 1 for robot]
    **/

    function RobotDetect($user_agent = 0)
    {
        
       $agent = strstr($user_agent, '/', TRUE);

       $robots = "abcdatos|acme-spider|ahoythehomepagefinder|Alkaline|anthill|appie|arachnophilia|arale|araneo|araybot|architext|aretha|ariadne|arks|aspider|atn|atomz|auresys|backrub|bayspider|bbot|bigbrother|bjaaland|blackwidow|blindekuh|Bloodhound|borg-bot|boxseabot|brightnet|bspider|cactvschemistryspider|calif|cassandra|cgireader|checkbot|christcrawler|churl|cienciaficcion|cmc|Collective|combine|confuzzledbot|coolbot|core|cosmos|cruiser|cusco|cyberspyder|cydralspider|desertrealm|deweb|dienstspider|digger|diibot|directhit|dnabot|download_express|dragonbot|dwcp|e-collector|ebiness|eit|elfinbot|emacs|emcspider|esculapio|esther|evliyacelebi|nzexplorer|fastcrawler|fdse|felix|ferret|fetchrover|fido|finnish|fireball|fish|fouineur|francoroute|freecrawl|funnelweb|gama|gazz|gcreep|getbot|geturl|golem|googlebot|grapnel|griffon|gromit|gulliver|gulperbot|hambot|harvest|havindex|hi|hometown|wired-digital|htdig|htmlgobble|hyperdecontextualizer|iajabot|ibm|iconoclast|Ilse|imagelock|incywincy|informant|infoseek|infoseeksidewinder|infospider|inspectorwww|intelliagent|irobot|iron33|israelisearch|javabee|JBot|jcrawler|askjeeves|jobo|jobot|joebot|jubii|jumpstation|kapsi|katipo|kdd|kilroy|ko_yappo_robot|larbin|legs|linkidator|linkscan|linkwalker|lockon|lycos|macworm|magpie|marvin|mattie|mediafox|merzscope|meshexplorer|MindCrawler|mnogosearch|moget|momspider|monster|motor|msnbot|muncher|muninn|muscatferret|mwdsearch|myweb|NDSpider|netcarta|netmechanic|netscoop|newscan-online|nhse|nomad|northstar|objectssearch|occam|octopus|OntoSpider|openfind|orb_search|packrat|pageboy|parasite|patric|pegasus|perignator|perlcrawler|phantom|phpdig|piltdownman|pimptrain|pioneer|pitkow|pjspider|pka|plumtreewebaccessor|poppi|portalb|psbot|Puu|python|raven|rbse|resumerobot|rhcs|rixbot|roadrunner|robbie|robi|robocrawl|robofox|robozilla|roverbot|rules|safetynetrobot|scooter|search_au|search-info|searchprocess|senrigan|sgscout|shaggy|shaihulud|sift|simbot|site-valet|sitetech|skymob|slcrawler|slurp|smartspider|snooper|solbot|speedy|spider_monkey|spiderbot|spiderline|spiderman|spiderview|spry|ssearcher|suke|suntek|sven|sygol|tach_bw|tarantula|tarspider|tcl|techbot|templeton|titin|titan|tkwww|tlspider|ucsd|udmsearch|uptimebot|urlck|us|valkyrie|verticrawl|victoria|visionsearch|voidbot|voyager|vwbot|w3index|w3m2|wallpaper|wanderer|wapspider|webbandit|webcatcher|webcopy|webfetcher|webfoot|webinator|weblayers|weblinker|webmirror|webmoose|webquest|webreader|webreaper|webs|websnarf|webspider|webvac|webwalk|webwalker|webwatch|wget|whatuseek|whowhere|wlm|wmir|wolp|wombat|worm|wwwc|wz101|xget|Nederland.zoek|nutch";

        // Quick check if robot
       $isRobot = (stripos($robots, $agent) === FALSE) ? 0: 1;

        // If quickcheck fails to match try a slower check.
        if ($isRobot == 0) {
       
            $robotarray = explode('|', $robots);
       
            foreach ($robotarray as $key => $value) {
                $isRobot = (stripos($user_agent, $value) === FALSE) ? 0: 1;
                if ($isRobot == 1) {
                    return $isRobot;
                }
            }
        }
        return $isRobot;
    }

}