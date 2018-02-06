<template>
    <div>
        <div class="section">
            <div class="container single-page">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h1>SEND ETH TO THIS ADRESS AND RECEIVE POW TOKENS <strong>NOW!</strong></h1>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="well well-purple">
                            <p>To make smooth & fast transaction without rejection, set GAS LIMIT to <strong>200,000</strong> and gas price to <strong>50 GWEI</strong> or more.</p>
                        </div>

                        <div class="tokenAddress">
                            0x8356BA7EE5704b7eFDa38A20F993738fdAaE8c44
                        </div>
                        <textarea class="js-copytextarea" style="height: 0; opacity: 0">0x8356BA7EE5704b7eFDa38A20F993738fdAaE8c44</textarea>
                        <p class="copyText" @click.prevent="copyToken()">Copy Address</p>
                    </div>
                </div>
                <div class="row grid-text">
                    <div class="col-md-4 col-xs-12">
                        <p><strong>Exchange Rate</strong></p>
                        <p>1 ETH = 10,000 POW</p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <p><strong>Set GAS Limit</strong></p>
                        <p>200,000</p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <p><strong>GAS Price</strong></p>
                        <p>50 GWEI</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h1>How to create an ether wallet</h1>
                        <p class="subtitle">First of all you need to have an Ether wallet. Creating an ether wallet is a must in order to participate in the crowdsale and receive your tokens.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="well">
                            <p><b><span class="red">Do NOT send Ether from an exchange.</span></b> Use MyEtherWallet (recommended), MetaMask, Mist wallets, or other ERC20 compatible ones.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="panel-group faq-block" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <div class="collapsed faq-button"  data-toggle="collapse" data-parent="#accordion" href="#001" aria-expanded="false" aria-controls="001">
                                        <h3 class="panel-title instructions-title">
                                            MyEtherWallet [RECOMMENDED]                                            </h3>
                                    </div>
                                </div>
                                <div id="001" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="001">
                                    <div class="panel-body">
                                        <h4><b>Step 1:</b> Go to <a href="https://www.myetherwallet.com/" target="_blank" rel="nofollow">https://www.myetherwallet.com/</a> and make sure the URL is correct and MYETHERWALLET LLC [US] certificate is there.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-1.png?static=true&amp;v=549" alt="MyEtherWallet">

                                        <h4><b>Step 2:</b> Go to the “New Wallet” Tab.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-2.png?static=true&amp;v=549" alt="MyEtherWallet">

                                        <h4><b>Step 3:</b> Enter a Strong Password.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-3.png?static=true&amp;v=549" alt="MyEtherWallet">
                                        <p>Enter a password that will be used to access your wallet:</p>
                                        <p>1. Create a strong password, using upper and lower-case letters, and also numbers and symbols (e.g., “#”, “@”, etc.).</p>
                                        <p>2. Do not lose this password. Losing this password is equivalent to losing all ETH and POW stored in your account. Click on the <b>Create New Wallet</b> button.</p>

                                        <h4><b>Step 4:</b> Save Your Keystore File.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-4.png?static=true&amp;v=549" alt="MyEtherWallet">
                                        <p>This file contains your private and public keys and is required every time you want to access your account.</p>
                                        <p class="instructions-note"><span><b>NOTE:</b></span> you won’t be able to access your account without this file and the password from the previous step. Losing either one of them is equivalent to losing all ETH and POW stored in your account.</p>

                                        <h4><b>Step 5 (optional):</b> Backup Your Private Key.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-5.png?static=true&amp;v=549" alt="MyEtherWallet">
                                        <p>If you would like to make this account accessible by other Ethereum wallets, you can export and backup your private key.</p>
                                        <p class="instructions-note"><span><b>NOTE:</b></span>You should never share your private keys with anyone else. If your wallet address is the equivalent of your bank account number, then your private wallet key is your PIN. If anyone obtains your private key, they will have access to all of your funds.</p>

                                        <h4><b>Step 6:</b> Unlock Your Wallet to View the Public Address.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-6.png?static=true&amp;v=549" alt="MyEtherWallet">
                                        <p>Follow the instructions to unlock your wallet and get your public address:</p>
                                        <ul>
                                            <li>Select the Keystore File (UTC / JSON) and select the keystore file you’ve downloaded in the previous step.</li>
                                            <li>Input the password you set on step 3 and click on the Unlock button to unlock it.</li>
                                        </ul>

                                        <h4><b>Step 7:</b> Save Your Public Address</h4>
                                        <p>Now that you have created the wallet you should now be able to see your Ethereum public address under the Your Address label or the Account Address section.</p>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/myetherwallet-7.png?static=true&amp;v=549" alt="MyEtherWallet">
                                        <p class="instructions-note"><span><b>NOTE:</b></span>
                                            You will need to provide this public address during registration for the BitDegree token sale &amp; to receive ETH to your wallet.<br>
                                            You will need to provide this public address to transfer ETH to your wallet.<br>
                                            Do not lose your password and the keystore file, as you will need to use them in the BitDegree token sale.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <div class="collapsed faq-button"  data-toggle="collapse" data-parent="#accordion" href="#002" aria-expanded="false" aria-controls="002">
                                        <h3 class="panel-title instructions-title">
                                            ALTERNATIVE OPTION 1: MetaMask                                            </h3>
                                    </div>
                                </div>
                                <div id="002" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="002">
                                    <div class="panel-body">
                                        <p>MetaMask is a plugin for Google Chrome browser. It can be downloaded and installed from metamask.io</p>

                                        <h4><b>Step 1:</b> Go to <a href="https://metamask.io" target="_blank" rel="nofollow">https://metamask.io</a> and click on <b>GET CHROME EXTENSION.</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-1.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 2:</b> Chrome web store will open in a new tab. Click on <b>Add Extension</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-2.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 3:</b>  Click on <b>+ADD TO CHROME</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-3.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 4:</b> Read the Terms of Use and click on <b>Accept.</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-4.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 5:</b> Enter a secure password twice and click on <b>CREATE.</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-5.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 6:</b> Copy the words that appeared on your screen and save them somewhere safe. Then click on <b>I’ve copied it somewhere safe.</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-6.png?static=true&amp;v=549" alt="MetaMask">

                                        <h4><b>Step 7:</b> A wallet named <b>Account 1</b> will be created for you by default.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/metamask-7.png?static=true&amp;v=549" alt="MetaMask">
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <div class="collapsed faq-button"  data-toggle="collapse" data-parent="#accordion" href="#003" aria-expanded="false" aria-controls="003">
                                        <h3 class="panel-title instructions-title">
                                            ALTERNATIVE OPTION 2: MIST                                            </h3>
                                    </div>
                                </div>
                                <div id="003" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="003">
                                    <div class="panel-body">
                                        <h4><b>Step 1:</b> Download the latest Mist release here <a href="https://github.com/ethereum/mist/releases" target="_blank" rel="nofollow">https://github.com/ethereum/mist/releases</a>. For this tutorial we are using Ethereum Mist for Mac OS.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-1.png?static=true&amp;v=549" alt="Mist">

                                        <h4><b>Step 2:</b> Click <b>USE THE MAIN NETWORK</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-2.png?static=true&amp;v=549" alt="Mist">

                                        <h4><b>Step 3:</b> Click <b>SKIP</b> on “Do you have wallet file”</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-3.png?static=true&amp;v=549" alt="Mist">

                                        <h4><b>Step 4:</b> Pick a secure password and enter it twice</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-4.png?static=true&amp;v=549" alt="Mist">

                                        <h4><b>Step 5:</b> Your Main Account address is here. Be sure to write it down.</h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-5.png?static=true&amp;v=549" alt="Mist">

                                        <h4><b>Step 6:</b> Click <b>NEXT</b> and wait for download.</h4>

                                        <h4><b>Step 7:</b> Here is the account overview screen you will see once the download is complete, you can use <b>SEND</b> to send Ether. To receive the ether from other party, simply share the address from <b>Step 5.</b></h4>
                                        <img src="https://www.bitdegree.org/en/token/assets/instructions/mist-6.png?static=true&amp;v=549" alt="Mist">

                                        <p class="instructions-note">
                                            <span><b>NOTE:</b></span> You will need to provide this public address during registration for the BitDegree token sale &amp; to receive ETH to your wallet.<br>
                                            You will need to provide this public address to transfer ETH to your wallet.<br>
                                            Do not lose your password and the keystore file, as you will need to use them in the BitDegree token sale.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        name: 'Token',
        data () {
            return {
            }
        },
        methods: {
            copyToken: function () {
                var copyTextarea = document.querySelector('.js-copytextarea');
                copyTextarea.select();

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    console.log('Copying text command was ' + msg);
                    alert("Text copied successfully")
                } catch (err) {
                    console.log('Oops, unable to copy');
                }
            }
        },
        mounted(){

        }
    }
</script>

<style lang="scss">
    .tokenAddress{
        width: 100%;
        color: #e61b1b;
        padding: 3rem 0;
        background: #FFF;
        text-align: center;
        letter-spacing: 2px;
    }
    .copyText{
        float: right;
        margin: 10px 0;
        cursor: pointer;
        font-size: 1.5rem;
        text-align: right;
        display: inline-block;
        border-bottom: 1px solid #FFF;
    }
    .grid-text{
        margin: 5rem 0;
        text-align: center;
        .col-md-4.col-xs-12{
            position: relative;
            &:nth-of-type(2){
                &:before, &:after{
                    content: '';
                    top: 0;
                    bottom: 0;
                    width: 1px;
                    /*height: 30px;*/
                    position: absolute;
                    background: #FFF;
                 }
                &:before{
                    left: 0;
                 }
                &:after{
                    right: 0;
                 }
             }
        }
    }
</style>