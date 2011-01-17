<?php
#
# Loading an appropriate HTML5 player will change as the standard gets better, add cases here
#

//Progressive/Predictive buffering in Chrome is far better with a video tag
if( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Chrome' ))
{
  echo '<video preload="none" controls="" id="musicplayer" class="chrome"></video>' . "\r\n";
}

//Safari codec set on windows isn't as good in the audio tag
else if( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Safari' ) && strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Windows' ))
{
  echo '<video preload="none" controls="" id="musicplayer" class="safari-win"></video>' . "\r\n";
}

//Safari can use audio just fine on the mac..the player looks quite different
else if( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Safari' ) && strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Macintosh' ))
{
  echo '<audio preload="none" controls="" id="musicplayer" class="safari-mac"></audio>' . "\r\n";
}

//iPad can use audio just fine as well..the player looks quite different again
else if( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Safari' ) && strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'iPad; U' ))
{
  echo '<audio preload="none" controls="" id="musicplayer" class="safari-ipad"></audio>' . "\r\n";
}

//firefox lacks support for HTML5 MP3 codec playback, so we'll use jPlayer and get support from flash (sigh)
else if( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Firefox' ))
{
  use_stylesheet( '/css/jPlayer.Skin/jplayer.blue.monday.css');
  use_javascript( '/js/jQuery.jPlayer.2.0.0/jquery.jplayer.min.js' );
  echo <<<EOL
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div class="jp-audio">
    <div class="jp-type-single">
      <div id="jp_interface_1" class="jp-interface" style="top: -10px; left: -20px; border: none; background: none">
        <ul class="jp-controls">
          <li><a href="#" class="jp-play" tabindex="1">play</a></li>
          <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
          <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-current-time"></div>
        <div class="jp-duration"></div>
      </div>
    <div>
  </div>
</div>
EOL;

$jplayer_player_loader = <<<EOL
$("#jquery_jplayer_1").jPlayer({
                                ended: function() { 
                                  streeme.playNextSong();
                                },
                                swfPath: "/js/jQuery.jPlayer.2.0.0",
                                solution: "flash, html",
                                volume: 1
                              });
EOL;

slot( 'javascript_player_loader', $jplayer_player_loader );
}

//audio for all other HTML5 implementations
else
{
  echo '<audio preload="none" controls="" id="musicplayer"></audio>';
}
?>