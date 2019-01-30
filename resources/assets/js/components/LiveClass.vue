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
import mux from 'videojs-mux'

export default {
    data () {
        return {
            url: 'https://5c3618658133b.streamlock.net/live/myStream/playlist.m3u8?DVR'
        }
    },
    mounted () {
        this.initApp()
    },
    methods: {
         initApp() {
            // Install built-in polyfills to patch browser incompatibilities.
            shaka.polyfill.installAll()

            // Check to see if the browser supports the basic APIs Shaka needs.
            if (shaka.Player.isBrowserSupported()) {
                // Everything looks good!
                this.initPlayer()
            } else {
                // This browser does not have the minimum set of APIs we need.
                console.error('Browser not supported!')
            }
        },
        initPlayer() {
            // Create a Player instance.
            var video = this.$refs.video
            var player = new shaka.Player(video);
            player.configure('manifest.defaultPresentationDelay', 0);
            window.player = player;

            player.addEventListener('error', this.onErrorEvent)
            // Try to load a manifest.
            // This is an asynchronous process.
            player.load(this.url).then(function() {
                // This runs if the asynchronous load is successful.
                console.log('The video has now been loaded!')
            }).catch(this.onError)  // onError is executed if the asynchronous load fails.
        },
        onErrorEvent(event) {
            // Extract the shaka.util.Error object from the event.
            this.onError(event.detail)
        },
        onError(error) {
            // Log the error.
            console.error('Error code', error.code, 'object', error)
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