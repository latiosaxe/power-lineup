<template>
    <div>
        <div class="section">
            <div class="mainLogo">
                <img src="/images/PowerLineUp.png" alt="Power LineUp">
                <h2>Fantasy Strategy powered by the Ethereum Network</h2>
            </div>
            <script type="x-shader/x-vertex" id="wrapVertexShader">
              varying vec2 vUv;
              uniform float t;
              uniform vec2 resolution;
              const float Pi = 3.1415926;
              const float TwoPi = Pi * 2.0;
              void main() {
                vUv = uv;
                vec3 pos = position;
                pos.z += (
                  (
                    ( sin( t + ( position.x / ( resolution.x * 0.5) * TwoPi ) ) * 2.0)
                    + ( sin( t + 3.5 + ( position.y / ( resolution.y * 0.5) * TwoPi ) ) * 0.75)
                    + ( cos( t + position.z ) * 1.0 )
                  )
                  / 2.0
                );
                gl_Position = projectionMatrix * modelViewMatrix * vec4( pos, 1.0 );
              }
            </script>
            <script type="x-shader/x-fragment" id="wrapFragmentShader">
                varying vec2 vUv;
                uniform float numStripes;
                void main(){
                  float k;
                  if(fract(vUv.y * numStripes) < 0.20){
                      k = 1.0;
                      gl_FragColor = vec4(vec3( k ), 1);
                      gl_FragColor.a = 1.0;
                  }else{
                    gl_FragColor.a = 0.0;
                  }
                }
            </script>
            <div id="targetThree"></div>
        </div>
        <div class="subscribe">
            <div class="container upupup">
                <p class="title">PowerLineUp (POW) Token Distribution</p>
                <p class="subtitle">Regular Price: 1 ETH = 1000 POW.<br/>
                    CrowdSale starts Jan 1st 2018.<br/>
                    Closes Permanently at Block<br/>
                    5012600.</p>
                <div class="green">
                    <div class="progress">
                        <div class="inner">
                            <div class="percent" :class="[(tokens.percentage>34)?'white':'']"><span v-text="tokens.percentage"></span>%</div>
                            <div class="water" :style="{top: 100-tokens.percentage +'%'}"></div>
                            <div class="glare"></div>
                        </div>
                    </div>
                    <div class="bar">
                        <div class="text">
                            <span v-text="tokens.init"></span> / <strong v-text="tokens.end"></strong> Tokens
                        </div>
                        <div class="block" :style="{width: tokens.percentage +'%'}"></div>
                    </div>
                    <div class="water" :style="{top: 100-tokens.percentage +'%'}"></div>
                </div>
                <p class="caption">
                    1st Day Mega Bonus 300%
                    <!--Distribution bonus will close permanetly at block 5523769 (the last block of 2017) or sooner if all tokens are purchased. No distribution is going to be held-->
                    <!--ever again. Platform Will open Q2 2018. Tokens Will be tradeable at regular price.-->
                </p>
                <p class="caption">
                    1 ETH = 3000 POW
                </p>

                <div class="count-down-time">
                    <p class="time-left">Time Left: <span v-text="timeLeft"></span></p>
                    <a href="/get-tokens" class="btn">Get Tokens Now</a>
                    <!--<button @click.prevent="iWantTokens()">Get Tokens Now</button>-->
                </div>

                <p class="endedText">Next Stage 1 ETH = 2000 POW.</p>
                <!--<div class="text">Apply for <strong>AirDrop</strong>.</div>-->
                <!--<form @submit.prevent="submitEmail">-->
                    <!--<input type="email" v-model="userEmail" placeholder="alex@domain.com">-->
                    <!--<button type="submit">Submit</button>-->
                <!--</form>-->
            </div>

            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
        <div class="tableReference">
            <table>
                <tbody>
                    <tr>
                        <td>Stage 1</td>
                        <td>1st Day</td>
                        <td>300% Bonus</td>
                        <td>1 ETH = 3000 POW</td>
                        <td>January 1st Only.</td>
                    </tr>
                    <tr>
                        <td>Stage 2</td>
                        <td>1st Week</td>
                        <td>200% Bonus</td>
                        <td>1 ETH = 2000 POW</td>
                        <td>Opens Jan 2nd - Closes  Jan 7th 2018.</td>
                    </tr>
                    <tr>
                        <td>Stage 3</td>
                        <td>2nd Week</td>
                        <td>150% Bonus</td>
                        <td>1 ETH = 1500 POW</td>
                        <td>Opens Jan 8th - Closes Jan  14th 2018.</td>
                    </tr>
                    <tr>
                        <td>Last Stage</td>
                        <td>Last 2 Weeks</td>
                        <td>Regular Price</td>
                        <td>1 ETH = 1000 POW</td>
                        <td>Opens Jan 15th - Closes Jan 31th 2018.</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">Open Distribution Closes Permanently Jan 31st 2018 at Block 5012600.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="opinions">
            <div class="container">
                <div class="single">
                    <div class="text">
                        Is like FanDuel but open, bigger, and more exciting! – <strong>CoinDesk.</strong>
                    </div>
                    <div class="logo">
                        <img src="https://surveymonkey-assets.s3.amazonaws.com/survey/123258376/6c9cda2a-cb03-4ae8-bfdb-282d4df5000c.png" alt="CoinDesk">
                    </div>
                </div>
                <div class="single">
                    <div class="text">
                        “Draft Kings meets Ethereum in a never ending exciting game.” –<strong>The Merkle.</strong>
                    </div>
                    <div class="logo">
                        <img src="https://www.merkleinc.com/themes/custom/merkle/build/images/icons/Merkle_Logo.svg" alt="The Merkle">
                    </div>
                </div>
            </div>
        </div>
        <div class="desc">
            <div class="container upupup">
                <div class="single">
                    <h3>Fantasy Sports</h3>
                    <p>All the excitement of classic fantasy sports brought to the blockchain in an open peer-to-peer, fair, solid, massive game.</p>
                    <img src="/images/home/fantasy-sports.jpg" alt="Fantasy Sport" class="max">
                </div>
                <div class="single">
                    <h3>Fantasy Networks</h3>
                    <p>Prepare your budget to align Youtube stars in our already built-in Smart Contracts to play this brand new kind of Fantasy Tournament.</p>
                </div>
                <div class="single">
                    <h3>Fantasy Movies</h3>
                    <p>Stake on your favorite movies and win with the next blockbuster or the unexpected boom of an indie underdog.</p>
                </div>
            </div>
            <div id="targetThreeTwo"></div>
        </div>

        <div class="white-block">
            <div class="container">
                <p>
                    Betting is not fun. In Fantasy World you stake your tokens in a Smart contract on your favorite athletes, movies and stars, and you win new tokens if your strategy is good.
                </p>
                <p>
                    But after every tournament, it doesn’t matter if you win or loose, you get back your original tokens! This is the new way to play strategic fantasy powered by POW Tokens and the Ethereum Network.
                </p>
                <p class="text-center">
                    <img src="/images/home/power_eth.jpg" alt="Power + ETH">
                </p>
            </div>
        </div>


        <div class="half-half">
            <div class="container">
                <div class="half">
                    <div class="title">Fantasy eSports</div>
                    <p>For the first time be able to team-up with the stars of the new massive phenomena moving millions.</p>
                    <img src="/images/home/fantasy-eSports.jpg" alt="Fantasy eSports" class="max">
                </div>
                <div class="half">
                    <div class="title">Fantasy Internet</div>
                    <p>Prepare your budget to align Youtube stars in our already built-in Smart Contracts to play this brand new kind of Fantasy Tournament.</p>
                    <img src="/images/home/fantasy-internet.jpg" alt="Fantasy Internet" class="max">
                </div>
            </div>
        </div>

        <div class="half-half">
            <div class="container">
                <div class="half">
                    <div class="title">Classic-Style Tournament</div>
                    <p>Play against other players, and win
                        the jackpot. Wether you win or loose,
                        your stacked tokens return to you
                        always. The prize is all the new tokens
                        generated during the tournament.
                        The winners take it all!</p>
                    <img src="images/ClassicTournament.png" alt="Classic Tournament">
                </div>
                <div class="half">
                    <div class="title">Solo Mining</div>
                    <p>Stake on your favorites and mine new
                        tokens for every touchdown, goal,
                        subscriber, platinum disk, ticket sold, etc.
                        Remember this is fantasy world and fans
                        from sports, movies, esports and the whole
                        internet are welcome.</p>
                    <img src="images/SoloMining.png" alt="Solo Mining">
                </div>
                <p>
                    Watch out, you never expend or loose your tokens! You just stake them during the tournament to get more
                    Learn How.
                </p>
            </div>
        </div>


        <div class="white-block">
          <div class="container">
            <p><strong>Featured Leagues</strong></p>

            <ul class="logos_4">
                <li><img src="/images/featured-league/UEFA_Champions_League.png" alt=""></li>
                <li><img src="/images/featured-league/nfl.png" alt=""></li>
                <li><img src="/images/featured-league/nba.png" alt=""></li>
                <li><img src="/images/featured-league/mlb.png" alt=""></li>
            </ul>
            <br>
            <ul class="logos_4">
              <li><img src="/images/featured-league/atp.png" alt=""></li>
              <li><img src="/images/featured-league/lol.png" alt=""></li>
              <li><img src="/images/featured-league/russia.png" alt=""></li>
              <li><img src="/images/featured-league/evo.png" alt=""></li>
            </ul>
          </div>
        </div>

        <div class="white-block">
            <div class="container">
                <p>
                    Win big and change your tokens for digital assets from AppStore, Google Play, Spotify and Amazon, or Or change them for real world prizes like trips to the best tournaments around the world, meet-and-greets with your favorite stars and a huge stock of our partner brands.
                </p>
                <ul class="logos_3">
                    <li><img src="/images/logos/adidas.png" alt="Adidas"></li>
                    <li><img src="/images/logos/expedia.png" alt="Expedia"></li>
                    <li><img src="/images/logos/skullcandy.png" alt="Skullcandy"></li>
                </ul>
                <p>Or just keep playing to win even more.</p>
                <hr>
                <p>
                    Enough Fantasy? Change your tokens back to ether in the main exchange markets, the proyected growth of our user base will always provide a bigger and bigger demand of the tokens.
                </p>
                <ul class="logos_4">
                    <li><img src="/images/logos/fuelbank.png" alt="Fuel Bank"></li>
                    <li><img src="/images/logos/bittrex.png" alt="Bittrex"></li>
                    <li><img src="/images/logos/delta.png" alt="Ether Delta"></li>
                    <li><img src="/images/logos/hitbtc.png" alt="HITbtc"></li>
                </ul>
                <hr>
                <p>As seen on :</p>
                <ul class="logos_4">
                    <li><img src="/images/logos/coin.png" alt="coinDesk"></li>
                    <li><img src="/images/logos/me.png" alt="ME"></li>
                    <li><img src="/images/logos/espn.png" alt="ESPN"></li>
                    <li><img src="/images/logos/crypto.png" alt="CRYPTO"></li>
                </ul>
            </div>
        </div>

    </div>
</template>
<script>
    import axios from 'axios';
    import VueSweetAlert from 'vue-sweetalert';

    export default {
        name: 'Home',
        data () {
            return {
                userEmail: '',
                hero: {
                    particles: 80
                },
                tokens: {
                    init: 0,
                    end: 0,
                    percentage: 0
                },
                timeLeft: '',
            }
        },
        methods: {
            submitEmail: function (event) {
                event.preventDefault();

                let self = this;
                axios.post('/newsletterUser', {
                    email: self.userEmail
                })
                .then(function (response) {
                    console.log(response);
                    self.userEmail = '';
                    self.$swal('You are Inn, We\'ll let you know by email what\'s next');
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            generateCanvas: function () {
                let renderCalls = [];
                function render () {
                    requestAnimationFrame( render );
                    renderCalls.forEach((callback)=>{ callback(); });
                }
                render();

                let scene = new THREE.Scene();

                let camera = new THREE.PerspectiveCamera( 80, window.innerWidth / window.innerHeight, 0.1, 800 );
                camera.position.set(0, 5, 10);

                let camera2 = new THREE.PerspectiveCamera( 80, window.innerWidth / window.innerHeight, 0.1, 800 );
                camera2.position.set(0, 20, 20);

                let renderer = new THREE.WebGLRenderer({ alpha: true });
                let renderer2 = new THREE.WebGLRenderer({ alpha: true });
                renderer.setClearColor( 0xffffff, 0);
                renderer.setPixelRatio( window.devicePixelRatio );
                renderer.setSize( window.innerWidth, window.innerHeight );

                renderer.toneMapping = THREE.LinearToneMapping;
                renderer.toneMappingExposure = Math.pow( 0.94, 5.0 );
                renderer.shadowMap.enabled = true;
                renderer.shadowMap.type = THREE.PCFShadowMap;

                renderer2.setClearColor( 0xffffff, 0);
                renderer2.setPixelRatio( window.devicePixelRatio );
                renderer2.setSize( window.innerWidth, window.innerHeight );

                renderer2.toneMapping = THREE.LinearToneMapping;
                renderer2.toneMappingExposure = Math.pow( 0.94, 5.0 );
                renderer2.shadowMap.enabled = true;
                renderer2.shadowMap.type = THREE.PCFShadowMap;

                window.addEventListener( 'resize', function () {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize( window.innerWidth, window.innerHeight );
                    renderer2.setSize( window.innerWidth, window.innerHeight );
                }, false );

                document.getElementById('targetThree').appendChild( renderer.domElement);
                document.getElementById('targetThreeTwo').appendChild( renderer2.domElement);

                function renderScene(){ renderer.render( scene, camera ); renderer2.render( scene, camera2 ); }
                renderCalls.push(renderScene);

                let width = 50.0,
                        height = 120.0;

                let texture = new THREE.TextureLoader().load("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 8 8'%3E %3Crect width='100%25' height='0.75' y='1' /%3E  %3C/svg%3E" );
                texture.wrapS = THREE.RepeatWrapping;
                texture.wrapT = THREE.RepeatWrapping;
                texture.repeat.set( width, height );
                let geometry = new THREE.PlaneGeometry( width, height, width, height );

                let shaderMat = new THREE.ShaderMaterial({
                    transparent: true,
                    depthTest: true,
                    side: THREE.DoubleSide,
                    vertexShader: document.getElementById("wrapVertexShader").textContent,
                    fragmentShader: document.getElementById("wrapFragmentShader").textContent,
                    fog: false,
                    uniforms: THREE.UniformsUtils.merge( [
                        THREE.UniformsLib[ "fog" ],
                        {
                            map: { value: texture },
                            resolution: { value: texture.repeat },
                            t: { value: 0.1 },
                            numStripes: { value: height }
                        }
                    ])

                });

                shaderMat.transparent = true;

                let mesh = new THREE.Mesh( geometry, shaderMat );
                mesh.rotation.x = Math.PI * 0.55;
                mesh.rotation.z = Math.PI * 0.45;
                mesh.rotation.y = Math.PI * 0.05;

                mesh.position.z = -6;
                mesh.position.y = 6;

                renderCalls.push(function(){
                    shaderMat.uniforms.t.value += 0.04;
                });

                scene.add(mesh);
            },
            iWantTokens: function () {
                console.log( "Tokens" );
            }
        },
        mounted(){
            let self = this;
            axios.get('/getTokens')
            .then(function (response) {
                console.log(response.data.tokens[0]);
                self.tokens.init = response.data.tokens[0].token_init;
                self.tokens.end = response.data.tokens[0].token_end;

                self.tokens.percentage = parseInt( ( self.tokens.init * 100 ) / self.tokens.end );
            })
            .catch(function (error) {
                console.log(error);
            });

            setTimeout(function(){
                let deadline = 'Jan 31 2018 23:00:00 GMT-0600';
                function time_remaining(endtime){
                    let t = Date.parse(endtime) - Date.parse(new Date());
                    let seconds = Math.floor( (t/1000) % 60 );
                    let minutes = Math.floor( (t/1000/60) % 60 );
                    let hours = Math.floor( (t/(1000*60*60)) % 24 );
                    let days = Math.floor( t/(1000*60*60*24) );
                    return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
                }
                function run_clock(endtime){
                    let days_span;
                    let hours_span;
                    let minutes_span;
                    let seconds_span;

                    function update_clock(){
                        let t = time_remaining(endtime);
                        console.log( t );

                        if( t.total > 0){
                            days_span = t.days + ' days ';
                            hours_span = ('0' + t.hours).slice(-2) + ' hours ';
                            minutes_span = ('0' + t.minutes).slice(-2) + ' minutes ';
                            seconds_span = ('0' + t.seconds).slice(-2) + ' seconds';
                            self.timeLeft = days_span + hours_span + minutes_span + seconds_span;
                            if(t.total<=0){ clearInterval(timeinterval); }
                        }else{
                            self.timeLeft = 'Time ended';
                        }
                    }
                    update_clock();
                    let timeinterval = setInterval(update_clock,1000);
                }
                run_clock(deadline);
                this.generateCanvas();
            }.bind(this), 100);
        }
    }
</script>

<style lang="scss">
    /*body{*/
        /*overflow-x: hidden;*/
        /*overflow-y: auto;*/
    /*}*/
    $color-1: #e61b1b;

    body {
        width: 100vw;
        height: 100vh;
        font-size: 2rem;
        background: linear-gradient(-45deg, #e61b1b, #ec2548);
        background-size: 100% 100%;
        /*animation: Gradient 15s ease infinite;*/
    }
    #targetThree{
        width: 100vw;
        height: 100vh;
        display: block;
        background: transparent;
    }
    .count-down-time{
        color: #000;
        font-weight: bold;
        text-align: center;
        .time-left{
            margin: 0 0 10px 0;
            letter-spacing: 2px;
            padding: 40px 0 20px;
            text-transform: uppercase;
        }
    }
    .mainLogo{
        top: 50%;
        left: 50%;
        text-align: center;
        position: absolute;
        transform: translate3d( -50%, -50%, 0 );
        h2{
            /*color: $color-1;  */
            color: #FFF;
            /*text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);*/
            display: inline-block;
            background: $color-1;
            padding: 14px 30px;
        }
    }
    .upupup{
        position: relative;
        z-index: 2;
    }
    .tableReference{
        width: 100%;
        display: block;
        padding: 10rem 0;
        background: #b30e0e;
        table{
            margin: 0 auto;
            max-width: 1200px;
            tr{
                td{
                    color: #FFF;
                    padding: 10px;
                    font-size: 1.8rem;
                    border: 1px solid #FFF;
                }
            }
        }
    }
    .subscribe{
        overflow: hidden;
        padding: 10rem 0;
        background: #FFF;
        position: relative;
        .title{
            z-index: 3;
            top: 2rem;
            left: 15px;
            color: #000;
            font-size: 3rem;
            position: absolute;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .subtitle{
            z-index: 3;
            top: 7rem;
            width: 50%;
            left: 15px;
            color: #000;
            font-size: 1rem;
            position: absolute;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .caption{
            z-index: 9;
            /*top: 7rem;*/
            color: #000;
            margin: 0;
            font-size: 1.4rem;
            text-align: center;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .endedText{
            color: #FFF;
            margin-top: 20px;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
            text-align: center;
            font-size: 1.3rem;
        }
        .text, form{
            color: #000;
            font-weight: bold;
            vertical-align: middle;
            display: inline-block;
        }
        .text{
            margin-right: 30px;
        }
        input{
            padding: 10px 20px;
            border: 2px solid $color-1;
        }
        button, .btn{
            border: 0;
            color: #FFF;
            border-radius: 0;
            padding: 12px 20px;
            background: $color-1;
        }
        .ocean {
            height: 0;
            width:100%;
            position:absolute;
            bottom:0;
            left:0;
            background: #e61b1b;
            .wave {
                background: url('/images/wave.svg') repeat-x;
                position: absolute;
                top: -198px;
                width: 6400px;
                height: 198px;
                animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) infinite;
                transform: translate3d(0, 0, 0);
                &:nth-of-type(2) {
                     top: -175px;
                     animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
                     opacity: 1;
                 }
            }
        }

        @keyframes wave {
            0% {
                margin-left: 0;
            }
            100% {
                margin-left: -1600px;
            }
        }

        @keyframes swell {
            0%, 100% {
                transform: translate3d(0,-25px,0);
            }
            50% {
                transform: translate3d(0,5px,0);
            }
        }
    }

    .opinions{
        color: #FFF;
        padding: 9rem 0;
        background: linear-gradient(0deg, #f44164, #b30e0e);
        /*background: linear-gradient(-45deg, #e61b1b, #f44164);*/
        background-size: 100% 100%;
        .single{
            width: 40%;
            margin-bottom: 30px;
            margin-left: 10%;
            position: relative;
            img{
                width: 70%;
                margin-top: 20px;
            }
            &:last-of-type{
                margin-left: 50%;
                 margin-bottom: 0;
             }
        }
    }
    .desc, .half-half{
        position: relative;
        padding: 9rem 0;
        background: linear-gradient(180deg, #FFF, #cdcdcd);
        background-size: 100% 100%;
        .single{
            padding: 2rem;
        }
        h3{
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            /*text-align: center;*/
            letter-spacing: 15px;
        }
        #targetThreeTwo{
            position: absolute;
            right: 0;
            bottom: 0;
        }
    }
    .half-half{
        color: #FFF;
        font-size: 0;
        background: $color-1;
        .half{
            width: 50%;
            vertical-align: top;
            display: inline-block;
            padding: 0 20px;
            .title{
                letter-spacing: 3px;
                font-size: 2.2rem;
            }
            p{
                margin: 30px 0;
                font-size: 2rem;
            }
            img{
                display: block;
                max-width: 100%;
                margin: 10px auto;
            }
        }
        p{
            margin: 15px 0;
            font-size: 2rem;
        }
    }


    .green {
        height: 250px;
        margin-top: 15px;
        position: relative;
        overflow: hidden;
        clear: both;
        .progress {
            float: right;
            position: relative;
            border-radius: 50%;
            width: 250px;
            height: 250px;
            border: 5px solid #e61b1b;
            -webkit-transition: all 1s ease;
            transition: all 1s ease;
            .inner {
                position: absolute;
                overflow: hidden;
                z-index: 2;
                border-radius: 50%;

                width: 240px;
                height: 240px;

                -webkit-transition: all 1s ease;
                transition: all 1s ease;

                .water {
                    position: absolute;
                    z-index: 1;
                    width: 200%;
                    height: 200%;
                    left: -50%;
                    border-radius: 40%;
                    -webkit-animation-iteration-count: infinite;
                    animation-iteration-count: infinite;
                    -webkit-animation-timing-function: linear;
                    animation-timing-function: linear;
                    -webkit-animation-name: spin;
                    animation-name: spin;
                    top: 25%;
                    background: rgba(230, 27, 27, 0.8);

                    -webkit-transition: all 1s ease;
                    transition: all 1s ease;

                    -webkit-animation-duration: 10s;
                    animation-duration: 10s;
                }
            }
        }
        .bar{
            left: 0;
            top: 50%;
            z-index: 2;
            right: 100px;
            height: 70px;
            margin-top: 15px;
            position: absolute;
            border-bottom: 3px solid #e61b1b;
            .block{
                padding: 2px;
                height: 28px;
                display: block;
                position: relative;
                border-radius: 30px;
                border: 4px solid #FFF;
                transition: width 500ms ease-out;
                background: linear-gradient(-90deg, #e61b1b, #f44164);
            }
        }
    }
    .green .progress .inner .glare,
    .red .progress .inner .glare,
    .orange .progress .inner .glare {
        position: absolute;
        top: -120%;
        left: -120%;
        z-index: 5;
        width: 200%;
        height: 200%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        border-radius: 50%;
    }
    .green .progress .inner .glare,
    .red .progress .inner .glare,
    .orange .progress .inner .glare {
        background-color: rgba(255,255,255,0.15);
    }
    .green .progress .inner .glare,
    .red .progress .inner .glare,
    .orange .progress .inner .glare {
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
    }
    .green .progress .inner .percent,
    .red .progress .inner .percent,
    .orange .progress .inner .percent {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-weight: bold;
        text-align: center;
    }
    .green .progress .inner .percent,
    .red .progress .inner .percent,
    .orange .progress .inner .percent {
        line-height: 240px;
        font-size: 92.3076923076923px;
    }
    .green .progress .inner .percent {
        color: #f44164;
        z-index: 2;
        &.white{
            color: #FFF;
            text-shadow: 0 0 20px rgba(236, 37, 72, 0.51);
         }
    }
    .green .progress .inner .percent {
        /*text-shadow: 0 0 10px #029502;*/
    }
    .green .progress .inner .percent,
    .red .progress .inner .percent,
    .orange .progress .inner .percent {
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
    }


    @-webkit-keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }


    .logos_3{
        width: 100%;
        font-size: 0;
        padding: 5rem 0;
        li{
            width: 33.33%;
            display: inline-block;
            vertical-align: middle;
            img{
                display: block;
                margin: 0 auto;
                max-width: 90%;
            }
        }
    }

    .logos_4{
        width: 100%;
        font-size: 0;
        padding: 5rem 0;
        li{
            width: 25%;
            display: inline-block;
            vertical-align: middle;
            img{
                display: block;
                margin: 0 auto;
                max-width: 80%;
            }
        }
    }

</style>
