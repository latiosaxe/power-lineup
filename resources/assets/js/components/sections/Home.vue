<template>
    <div>
        <div class="section">
            <div class="logo">
                <img src="/images/PowerLineUp.png" alt="Power LineUp">
                <!--<h2>ERC20 Ethereum Standard Token for Embedded Computing</h2>-->


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
        </div>
        <div class="">
            <div class="subscribe">
                <div class="container">
                    <div class="text">Apply for <strong>AirDrop</strong>.</div>
                    <form @submit.prevent="submitEmail">
                        <input type="email" v-model="userEmail" placeholder="alex@domain.com">
                        <button type="submit">Submit</button>
                    </form>
                </div>
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
                }
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
                    self.$swal('Gracias por registrarte, te enviaremos las instrucciones próximamente');
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted(){
            setTimeout(function(){
                var renderCalls = [];
                function render () {
                    requestAnimationFrame( render );
                    renderCalls.forEach((callback)=>{ callback(); });
                }
                render();

                var scene = new THREE.Scene();

                var camera = new THREE.PerspectiveCamera( 80, window.innerWidth / window.innerHeight, 0.1, 800 );
                camera.position.set(0, 5, 10);

                var renderer = new THREE.WebGLRenderer({ alpha: true });
                renderer.setClearColor( 0xffffff, 0);
                renderer.setPixelRatio( window.devicePixelRatio );
                renderer.setSize( window.innerWidth, window.innerHeight );

                renderer.toneMapping = THREE.LinearToneMapping;
                renderer.toneMappingExposure = Math.pow( 0.94, 5.0 );
                renderer.shadowMap.enabled = true;
                renderer.shadowMap.type = THREE.PCFShadowMap;

                window.addEventListener( 'resize', function () {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize( window.innerWidth, window.innerHeight );
                }, false );

                document.getElementById('targetThree').appendChild( renderer.domElement);

                function renderScene(){ renderer.render( scene, camera ); }
                renderCalls.push(renderScene);

                var width = 50.0,
                        height = 120.0;

                var texture = new THREE.TextureLoader().load("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 8 8'%3E %3Crect width='100%25' height='0.75' y='1' /%3E  %3C/svg%3E" );
                texture.wrapS = THREE.RepeatWrapping;
                texture.wrapT = THREE.RepeatWrapping;
                texture.repeat.set( width, height );
                var geometry = new THREE.PlaneGeometry( width, height, width, height );

                var shaderMat = new THREE.ShaderMaterial({
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

                var mesh = new THREE.Mesh( geometry, shaderMat );
                mesh.rotation.x = Math.PI * 0.55;
                mesh.rotation.z = Math.PI * 0.45;
                mesh.rotation.y = Math.PI * 0.05;

                mesh.position.z = -6;
                mesh.position.y = 6;

                renderCalls.push(function(){
                    shaderMat.uniforms.t.value += 0.04;
                });

                scene.add(mesh);
            }, 1000);
        }
    }
</script>

<style lang="scss">
    body{
        overflow-x: hidden;
        overflow-y: auto;
    }
    $color-1: #e61b1b;


    body {
        width: 100wh;
        height: 100vh;
        background: linear-gradient(-45deg, #e61b1b, #E73C7E);
        background-size: 400% 400%;
        animation: Gradient 15s ease infinite;
    }
    #targetThree{
        width: 100wh;
        height: 100vh;
    }

    @keyframes Gradient {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    canvas {
        display: block;
        background: transparent;
    }
</style>