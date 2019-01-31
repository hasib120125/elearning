<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 live_strm">
                <video id="video" width="640" ref="video" controls autoplay></video>
            </div>
        </div>
    </div>
</template>

<script>
import shaka from 'shaka-player'
import mux from 'mux.js'

export default {
    data () {
        return {
            url: 'https://5c3618658133b.streamlock.net/live/myStream/playlist.m3u8?DVR'
        }
    },
    mounted () {
        this.initApp()
        this.initPlayer()
    },
    methods: {
         initApp() {
            shaka.polyfill.installAll();

            if (shaka.Player.isBrowserSupported()) {
                initPlayer();
            } else {
                console.error('Browser not supported!');
            }
        },
        initPlayer() {

            // Create a Player instance.
            var video = this.$refs.video

            // shaka.media.ManifestParser.registerParserByExtension("m3u8", shaka.hls.HlsParser);
            // shaka.media.ManifestParser.registerParserByMime("Application/vnd.apple.mpegurl", shaka.hls.HlsParser);
            // shaka.media.ManifestParser.registerParserByMime("application/x-mpegURL", shaka.hls.HlsParser);

            var player = new shaka.Player(video);
            player.configure('manifest.defaultPresentationDelay', 0);
            window.player = player;

            player.addEventListener('error', onErrorEvent);

            player.load(manifestUri).then(function () {
                console.log('The video has now been loaded!');
            }).catch(onError);
        },
        onErrorEvent(event) {
            // Extract the shaka.util.Error object from the event.
            onError(event.detail);
        },
        onError(error) {
            // Log the error.
           console.error('Error code', error.code, 'object', error);
        }
    }
}
</script>

<style>
    .live_strm{
        text-align: center;
        padding-top: 10px;
    }
</style>