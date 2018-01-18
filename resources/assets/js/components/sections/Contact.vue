<template>
    <div>
        <div class="section">
            <div class="container">
                <div class="sec_people">
                    <h1 v-lang.title></h1>
                    <ul>
                        <li v-for="person in people" :class="{ active: person.active }">
                            <div class="left">
                                <img :src="'/images/people/'+ person.pic" alt="">
                            </div>
                            <div class="right">
                                <p class="name">{{ person.name }}</p>
                                <p class="title">{{ person.title }}</p>
                                <p class="address">{{ person.address }}</p>
                                <p class="country">{{ person.country }}</p>
                                <p class="emal"><a :href="'mailto:'+person.emal">{{ person.emal }}</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>
<script>

    import MultiLanguage from 'vue-multilanguage';

    Vue.use(MultiLanguage, {
        default: LOCAL
    });
    export default {
        name: 'Contact',
        data () {
            return {
                people: [
                    {
                        name: 'Moses Estrello',
                        title: 'Head of North America Operations',
                        emal: 'moses.estrello@powerlineup.io',
                        address: 'Paseo de la Reforma 483, Cuauhtémoc, 06500.',
                        country: 'Mexico City, Mexico.',
                        pic: 'moises.jpg',
                        active: false
                    },{
                        name: 'Jekaterina Rantanen ',
                        title: 'Head of Northern Europe Operations',
                        emal: 'jekaterina.rantanen@powerlineup.io',
                        address: 'Betonimiehenkuja 3D, 02150 Espoo.',
                        country: 'Helsinki, Finland.',
                        pic: 'jekaterina.jpg',
                        active: false
                    },{
                        name: 'Philippe Ribac',
                        title: 'Head of Southern Europe Operations',
                        emal: 'philippe.ribac@powerlineup.io',
                        address: '5, parvis Alan Turing, 75013',
                        country: 'Paris, France.',
                        pic: 'philippe.jpg',
                        active: false
                    },{
                        name: 'Martin Obando',
                        title: 'Head of South America Operations',
                        emal: 'martin.obando@powerlineup.io',
                        address: 'KREAB Building, Portugal 794, 17665.',
                        country: 'Quito, Ecuador',
                        pic: 'martin.jpg',
                        active: false
                    }
                ]
            }
        },
        messages: {
            de: {
                title: 'Contact'
            },
            en: {
                title: 'Contact'
            },
            fi: {
                title: 'Contact'
            },
            fr: {
                title: 'Contact'
            }
        },
        methods: {

        },
        mounted(){
            this.people.forEach( function (value, index) {
                console.log( index, value );
                setTimeout(function () {
                    value.active = true;
                }, 100 * index);
            });

        }
    }
</script>

<style lang="scss">
    .sec_people{
        color: #FFF;
        margin-top: 100px;
        li{
            width: 50%;
            display: inline-block;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 300ms ease-out;
            .left, .right{
                width: 47%;
                font-size: 0;
                display: inline-block;
                vertical-align: bottom;
            }
            .left{
                margin-right: 2%;
                img{
                    width: 100%;
                }
            }
            .right{}
            p,a{
                margin: 0 0 5px 0;
                color: #FFF;
                font-size: 14px;
            }
            a{
                display: block;
            }
            &.active{
                opacity: 1;
                transform: translateY(0);
            }
        }
    }
</style>