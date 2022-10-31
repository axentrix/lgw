

async function getAddons() {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const signer = provider.getSigner();
    const addr = await signer.getAddress();
    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    console.log("addr: " + addr);
    const addonsList = await contract2.getAddons();
    console.log("addons: " + addonsList);
    return addonsList;
}

async function getMyTokens() {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const signer = provider.getSigner();
    const addr = await signer.getAddress();
    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    const tokenList = await contract2.tokensOfOwner(addr);  // get array
    console.log("my tokens: " + tokenList);
    return tokenList;
}

async function isMintOpen() {
    // here we will change connection to infura, so user dont need to have wallet connected
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const signer = provider.getSigner();
    const addr = await signer.getAddress();
    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    console.log("addr: " + addr);
    const isOpen = await contract2.isOpen();
    console.log("isOpen: " + isOpen);
    return isOpen;
}

async function getBalanceOf() {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const signer = provider.getSigner();
    const addr = await signer.getAddress();
    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    const balance = await contract2.balanceOf(addr);
    return balance;
}

async function getNextAddonPrice() {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    //const signer = provider.getSigner();
    //const addr = await signer.getAddress();
    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    const price = await contract2.getAddonPrice();
    return price;
}

async function mintToken(numberOfTokens) {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const accounts = await provider.listAccounts();
    const signer = await provider.getSigner(accounts[0]);
    //const addr = await signer.getAddress();
    blkN = await provider.getBlockNumber()
    console.log("Block number: " + blkN);

    const utils = await import("./w-abi.js");

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi, signer);

    contract2.on("Transfer", (from, to, tokenId) => {

        signer.getAddress().then(a => {

            //console.log("Signer: " + a.toString());
            //console.log("Who: " + who);

            //if (a.toString() == who){
             ///   console.log("stejne");
             //   mintedToken.innerText = "Token id: " + id;
           // }
        });

        console.log("ids: " +  tokenId.toString());
    });

    console.log("Mint starting...");

    let error = "ok";

    try {
        const tx = await contract2.mint(ethers.BigNumber.from(numberOfTokens));

        const receipt = await tx.wait();

        const event2 = await receipt.events.find(x => x.event === "Transfer");
        //console.log("Receipt: " + receipt);
        //console.log("TokenID : " + event2.args.selectedAddonId);
        //console.log("delka xxx: " + event2.args[0].tokenId);
        console.log("TokenID xxxxxxx: " + event2.args.toString());


        //console.log("Receipt: " + receipt);
        console.log("Mint end...");

    }  catch (err) {
    //const code = err.data.replace('Reverted ','');
    console.log("Error in minting: " + err.reason);
    error = err.reason;
    //let reason = ethers.utils.toUtf8String('0x' + code.substr(138));
    //console.log('revert reason:', reason);
    }
    return error;
}

async function purchaseAddon(tokenID) {
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    await provider.send("eth_requestAccounts", []);
    const accounts = await provider.listAccounts();
    const signer = await provider.getSigner(accounts[0]);
    //const addr = await signer.getAddress();

    const utils = await import("./w-abi.js");

    // get addonPrice
    const contractPrice = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi , provider);
    const price = await contractPrice.getAddonPrice();
    console.log("Price: " + price);

    const contract2 = new ethers.Contract(utils.daiAddress.toString(), utils.daiAbi, signer);

    console.log("Purchasing...");

    /*
    contract2.on("AddonPurchased", (purchaser, selectedAddonId, _tokenId) => {

        signer.getAddress().then( a => {

            console.log("Signer: " + a.toString());
            //console.log("To: " + purchaser);

            //if (a.toString() == to){
            //    console.log("stejne");
            //    mintedToken.innerText = "Token id: " + tokenId.toString();
            //} else{
            //    console.log("nekdo jiny");
            //}
        });

        console.log("Who bought: " + purchaser);
        console.log("Addon ID: " + selectedAddonId.toString());
        console.log("For token ID: " + _tokenId.toString());

    });
    */

    let str = "{value: " + ethers.BigNumber.from(price)+"}";
    //console.log("str: " + str);

    let error = "ok";

    try {
        const tx = await contract2.purchaseAddon(tokenID, {value: ethers.BigNumber.from(price)}).catch((err) => { throw (err); });
        // ethers.utils.formatEther(a)
        // ethers.utils.parseEther("0.1")

        const receipt = await tx.wait(); //.catch((err) => { throw (err); });

        //const event2 = receipt.events.find(x => x.event === "AddonPurchased");

        //console.log("Receiptaasssa: " + receipt.toString());
        //console.log("TokenID : " + event2.args.selectedAddonId);
        //console.log("TokenID: " + event2.args._tokenId);

        console.log("Purchased...");
    } catch (err) {
        //const code = err.data.replace('Reverted ','');
        console.log("Error in purchasing addon: " + err.reason);
        error = err.reason;
        //let reason = ethers.utils.toUtf8String('0x' + code.substr(138));
        //console.log('revert reason:', reason);
    }

    return error; //receipt;
}



