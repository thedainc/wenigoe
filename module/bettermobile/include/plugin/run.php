<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ADMIN
 * Date: 11/16/12
 * Time: 2:12 PM
 * To change this template use File | Settings | File Templates.
 */

if (Phpfox::isModule('bettermobile')) {



    $sControllerName = Phpfox::getLib('module')->getFullControllerName();
    if(Phpfox::isMobile() || $sControllerName == 'forum.forum' ){
        //check version
        $sVersion = Phpfox::getVersion();
        $aVersion = preg_split('[\.]', $sVersion);
        $bNewVersion = false;
        if ($aVersion[0] >= 3 && $aVersion[1] >= 5) {
            $bNewVersion = true;
        }
        Phpfox::getLib('template')
            ->assign('bNewVersion', $bNewVersion);
        // check language
        $aLang = Phpfox::getLib('locale')->getLang();
        if ($aLang['direction'] == 'rtl')
        {
            Phpfox::getLib('template')->setHeader(array('
                    <script type="text/javascript" language="javascript">
                    var bRtl = true;
                    </script>'
            ));
            Phpfox::getLib('template')->setHeader('cache', array(
                    'rtl.css' => 'module_bettermobile'
                )
            );
        } else {
            Phpfox::getLib('template')->setHeader(array('
                    <script type="text/javascript" language="javascript">
                    var bRtl = false;
                    </script>'
            ));
        }

        if (Phpfox::getParam('bettermobile.set_background_is_image')) {
            $aImage = Phpfox::getService('bettermobile.background')->getActive();
            if (!empty($aImage)) {
                $sImage = sprintf($aImage['image'], '');
                Phpfox::getLib('template')
                    ->assign(array(
                    'sImageBackground' => Phpfox::getParam('bettermobile.image_url').$sImage
                ));
            } else {
                $sImage = '';
                Phpfox::getLib('template')
                    ->assign(array(
                    'sImageBackground' => ''
                ));
            }



        }
        $aLayout2 = array(
            'mobile.index',
            'profile.index',
            'event.view',
            'feed.index',
            'pages.view'
        );

        //if (!isset($this->_aVars['aFeed']['feed_view_comment']))
        //  $this->_aVars['bNewLink'] = true;

        if (in_array($sControllerName, $aLayout2)) {
            $bDefault = false;

            Phpfox::getLib('template')->assign(array(
                'bDefault' => $bDefault,
            ));
        }else{
            $bDefault = true;
            Phpfox::getLib('template')->assign(array(
                'bDefault' => $bDefault
            ));
        }

        Phpfox::getLib('template')->setHeader(array(
            'sidebar.js' => 'module_bettermobile',
            'audio.min.js' => 'module_bettermobile'
        ));
        Phpfox::getLib('template')->setHeader(array(
            '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />',
            '<link rel="apple-touch-icon" href="'. Phpfox::getParam('core.path') .'module/bettermobile/static/image/social-icon.png" />',


        ));


        $aCheck = Phpfox::getLib('request')->get('req1');
        $aCheck2 = Phpfox::getLib('request')->get('req2');
        if(!Phpfox::isUser()){
            if($aCheck2 == "login"){
                Phpfox::getLib('url')->send('');
            }
        }else{
            if($aCheck == ""){
                Phpfox::getLib('url')->send('feed');
            }
        }


        //check like count show
        $aStatus = Phpfox::getLib('request')->get('status-id');
        if($aStatus == ""){
            $bNewLink = false;
        } else {
            $bNewLink = true;
        }

        Phpfox::getLib('template')->assign(array(
            'bNewLink' => $bNewLink,
        ));


        //check ios
        if(Phpfox::getLib('request')->isIOS()){
            Phpfox::getLib('template')->setHeader(array('
                    <script type="text/javascript" language="javascript">
                    var iOs = true;
                    </script>'
            ));
        }else{
            Phpfox::getLib('template')->setHeader(array('
                    <script type="text/javascript" language="javascript">
                    var iOs = false;
                    </script>'
            ));
        }




        if (!Phpfox::isUser()) {
            Phpfox::getLib('template')->assign(array(
                'sMobileLogo' => Phpfox::getService('bettermobile.template')->getStyleLogo()
            ));
        }

    }
}