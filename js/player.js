var play = 0;
function play_song() {

        var player = SC.Widget($('iframe.sc-widget')[0]);

        //console.log("before " + pOffset);
        var pOffset = $('.progress').offset(); //Zero the progress bar 
        //console.log("after " + pOffset);
        var pWidth = $('.progress').width();

        var scrub;
        $('.progress').mousemove(function(e) { //Get position of mouse for scrubbing
                scrub = (e.pageX - pOffset.left);
        });

        $('.progress').click(function() { //Use the position to seek when clicked
                $('.progress-bar').css('width', scrub + "px");
                var seek = player.duration * (scrub / pWidth);
                player.seekTo(seek);
        });

        player.bind(SC.Widget.Events.READY, function(eventData) {
            setInfo();
        }); //Set info on load
        player.bind(SC.Widget.Events.PLAY_PROGRESS, function(e) {
            if (e.relativePosition < 0.003) {
                setInfo();
            }
            //Event listener when track is playing
            $('.progress-bar').css('width', (e.relativePosition * 100) + "%");

            if (!$(".play").hasClass('ion-ios-pause-outline')) {
                $(".play").removeClass('ion-ios-play-outline').addClass('ion-ios-pause-outline');
            }
        });

        player.bind(SC.Widget.Events.PAUSE, function(e) { //Event listener when track is paused
            setInfo();
            $(".play").addClass('ion-ios-play-outline').removeClass('ion-ios-pause-outline');
        });

        //Button
        $('.play').click(function() {
            if(player.getPaused == false){
                player.pause();
            } else {
                player.play();
            }
        });

        function setInfo() {
            player.getCurrentSound(function(song) {
                if (!song) {
                    //alert("setinfo");
                    //$('.player').slideUp(1000);
                    $('.title').html('No song selected');
                    $('.song').html('');
                    return;
                }
                //$('.player').slideDown(300);
                $('.title').html(song.user.username);
                $('.song').html(song.title);

                player.current = song;
            });

            player.getDuration(function(value) {
                player.duration = value;
            });


            player.isPaused(function(bool) {
                player.getPaused = bool;
            });
        }
        $('.cover').click(function() {
           //alert("change song");
            $(this).parent('.song-details').each(function() {

                var url = $(this).children('.link').text();
                //alert(url);

                if (url) {

                    player.pause();
                    $('.progress-bar').animate({width: "0px"}, 500);
                    var option = {
                        callback: function() {
                            //var pOffset = $('.progress').offset();
                            player.play();
                            setInfo();
                        }
                    }
                    player.load(url, option);

                }

            });
        });
} //end player


function play_song2() {

        var player = SC.Widget($('iframe.sc-widget')[0]);

        //console.log("before " + pOffset);
        var pOffset = $('.progress').offset(); //Zero the progress bar 
        //console.log("after " + pOffset);
        var pWidth = $('.progress').width();

        var scrub;
        $('.progress').mousemove(function(e) { //Get position of mouse for scrubbing
                scrub = (e.pageX - pOffset.left);
        });

        player.bind(SC.Widget.Events.READY, function(eventData) {
            setInfo();
        }); //Set info on load
        player.bind(SC.Widget.Events.PLAY_PROGRESS, function(e) {
            if (e.relativePosition < 0.003) {
                setInfo();
            }
            //Event listener when track is playing
            $('.progress-bar').css('width', (e.relativePosition * 100) + "%");

            if (!$(".play").hasClass('ion-ios-pause-outline')) {
                $(".play").removeClass('ion-ios-play-outline').addClass('ion-ios-pause-outline');
            }
        });

        player.bind(SC.Widget.Events.PAUSE, function(e) { //Event listener when track is paused
            setInfo();
            $(".play").addClass('ion-ios-play-outline').removeClass('ion-ios-pause-outline');
        });

        //Button
        $('.play').click(function() {
            if(player.getPaused == false){
                player.pause();
            } else {
                player.play();
            }
        });

        function setInfo() {
            player.getCurrentSound(function(song) {
                if (!song) {
                    //alert("setinfo");
                    //$('.player').slideUp(1000);
                    $('.title').html('No song selected');
                    $('.song').html('');
                    return;
                }
                //$('.player').slideDown(300);
                $('.title').html(song.user.username);
                $('.song').html(song.title);

                player.current = song;
            });

            player.getDuration(function(value) {
                player.duration = value;
            });


            player.isPaused(function(bool) {
                player.getPaused = bool;
            });
        }
        $('.cover').click(function() {
           //alert("change song");
            $(this).parent('.song-details').each(function() {

                var url = $(this).children('.link').text();
                //alert(url);

                if (url) {

                    player.pause();
                    $('.progress-bar').animate({width: "0px"}, 500);
                    var option = {
                        callback: function() {
                            //var pOffset = $('.progress').offset();
                            player.play();
                            setInfo();
                        }
                    }
                    player.load(url, option);

                }

            });
        });
} //end player

