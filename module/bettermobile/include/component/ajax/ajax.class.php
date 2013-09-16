<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ADMIN
 * Date: 11/16/12
 * Time: 3:56 PM
 * To change this template use File | Settings | File Templates.
 */

class Bettermobile_Component_Ajax_Ajax extends Phpfox_Ajax
{

    public function showSideBar(){
        $sShow = $this->get('sShow');
        $sShow = ($sShow == 'true') ? 'false' : 'true';
        if($sShow == 'true'){
            $sFocus= $this->get('sFocus');
            $this->call("$('#mobile_holder').css('left',270);");
            $this->call("$('#mobile_holder').css({position:'fixed'});");
            $this->call("$('#showsidebar').css({display:'block'});");
            if($sFocus == 'true'){
                $this->call("$('#header_sub_menu_search_input').focus();");
            }
        }else{
            $this->call("$('#mobile_holder').css('left',0);");
            $this->call("$('#mobile_holder').css({position:'relative'});");
            $this->call("$('#showsidebar').css({display:'none'});");
        }
        $this->html('#mobile_header_home1', "<a href=\"#\" onclick=\"$.ajaxCall('bettermobile.showSideBar', 'sShow=". $sShow ."')\" id=\"mobile_header_home\">Home</a>");
    }
    //notification ajax
    public function getAll()
    {
        if (!Phpfox::isUser())
        {
            $this->call('<script type="text/javascript">window.location.href = \'' . Phpfox::getLib('url')->makeUrl('user.login') . '\';</script>');
        }
        else
        {
            $_REQUEST['js_mobile_version']= true;
            Phpfox::getBlock('bettermobile.link');
        }
    }
    //friend ajax
    public function getRequests()
    {
        if (!Phpfox::isUser())
        {
            $this->call('<script type="text/javascript">window.location.href = \'' . Phpfox::getLib('url')->makeUrl('user.login') . '\';</script>');
        }
        else
        {
            $_REQUEST['js_mobile_version']= true;
            Phpfox::getBlock('bettermobile.accept');
        }
    }
    //mail ajax
    public function getLatest()
    {
        if (!Phpfox::isUser())
        {
            $this->call('<script type="text/javascript">window.location.href = \'' . Phpfox::getLib('url')->makeUrl('user.login') . '\';</script>');
        }
        else
        {
            $_REQUEST['js_mobile_version']= true;
            Phpfox::getBlock('bettermobile.latest');
        }
    }


    public function playInFeed()
    {
        $aSong = Phpfox::getService('music')->getSong($this->get('id'));

        if (!isset($aSong['song_id']))
        {
            $this->alert(Phpfox::getPhrase('music.unable_to_find_the_song_you_are_trying_to_play'));

            return false;
        }
        Phpfox::getService('music.process')->play($aSong['song_id']);

        $sSongPath = $aSong['song_path'];

        $sWidth = '425px';
        if ($this->get('track'))
        {
            $sWidth = '100%';
        }

        if ($this->get('is_player'))
        {
            $sDivId = 'js_music_player_all';
        }
        else
        {
            $sDivId = 'js_tmp_music_player_' . $aSong['song_id'];

            if ($this->get('feed_id'))
            {
                Phpfox::getBlock('bettermobile.audiojs', array('aSong' => $aSong));
                $this->call('$(\'#js_item_feed_' . $this->get('feed_id') . '\').find(\'.activity_feed_content_link:first\').html(\'<div id="' . $sDivId . '" >'. $this->getContent(false) .'</div>\');');
            }
            else
            {
                Phpfox::getBlock('bettermobile.audiojs', array('aSong' => $aSong));

                $this->call('$(\'#' . ($this->get('track') ? $this->get('track') : 'js_controller_music_play_' . $this->get('id') . '') . '\').html(\'<div id="' . $sDivId . '" >'. $this->getContent(false) .'</div>\');');
            }
        }

        // $this->call('$Core.player.load({id: \'' . $sDivId . '\', auto: true, type: \'music\', play: \'' . $sSongPath . '\'});');
        // Fixes http://www.phpfox.com/tracker/view/7262/
        $this->call('audiojs.events.ready(function(){audiojs.createAll();});');

    }
    public function aUserProfile(){

        $this->bUser = true;
    }
    // like process
    public function add()
    {
        Phpfox::isUser(true);

        if (Phpfox::getService('like.process')->add($this->get('type_id'), $this->get('item_id')))
        {
            if ($this->get('type_id') == 'feed_mini' && $this->get('custom_inline'))
            {
                $this->_loadCommentLikes();
            }
            else
            {
                $this->_loadLikes(true);
            }
        }
    }

    public function delete()
    {
        Phpfox::isUser(true);
        Phpfox::getService('like.process')->delete($this->get('type_id'), $this->get('item_id'), (int) $this->get('force_user_id'));
    }

    public function browse()
    {
        $this->error(false);
        Phpfox::getBlock('like.browse');
        $this->setTitle((($this->get('type_id') == 'pages' && $this->get('force_like') == '') ? Phpfox::getPhrase('like.members') : Phpfox::getPhrase('like.people_who_like_this')));
    }

    private function _loadCommentLikes()
    {
        $aComment = Phpfox::getService('comment')->getComment($this->get('item_id'));
        if ($aComment['total_like'] > 0)
        {
            $sPhrase = Phpfox::getPhrase('like.1_person');
            if ($aComment['total_like'] > 1)
            {
                $sPhrase = Phpfox::getPhrase('like.total_people', array('total' => $aComment['total_like']));
            }
            $this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder\').show();');
            $this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder_info\').html(\'' . $sPhrase . '\');');
        }
        else
        {
            $this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder\').hide();');
        }
    }

    private function _loadLikes($bIsLiked)
    {
        $aLikes = Phpfox::getService('like')->getLikesForFeed($this->get('type_id'), $this->get('item_id'), $bIsLiked, Phpfox::getParam('feed.total_likes_to_display'), true);
        $nId = '.no_like_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id'));
        if (!Phpfox::getService('like')->getTotalLikes())
        {
            $mId = '.no_like_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) . ' .like_icon';

            $sId = '#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id'));
            $this->html($sId, '');
            $this->call("$('$nId').show()");
            //$this->call("$('$mId').html(1+' <span>&middot;</span>')");

            // $this->call('$("'. $sId .'").parents(".comment_mini_content_holder").hide();');
            return;
        }

        $this->template()->assign(array(
                'aFeed' => array(
                    'feed_is_liked' => $bIsLiked,
                    'feed_total_like' => Phpfox::getService('like')->getTotalLikes(),
                    'like_type_id' => $this->get('type_id'),
                    'item_id' => $this->get('item_id'),
                    'likes' => $aLikes
                )
            )
        );

        $this->template()->getTemplate('bettermobile.block.display');


        $this->call("$('$nId').hide()");
    }

}