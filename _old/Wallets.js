import WalletClass from "./Classes/Wallet.Class.js";

export default function GetWallets(){
    fetch('backend/api/Wallet/Wallets.php')
    .then((response) => {
        return response.json();
    })
    .then((result) => {
      let Wallets = [];
      result.forEach(Wallet => Wallets.push(new WalletClass(Wallet.id,Wallet.name,Wallet.balance)));
      return Wallets;
    //   Wallets[0].Balance = 100;
    //   Wallets[1].Balance = 200;
    //   console.log(Wallets[0].Balance);
    //   console.log(Wallets[1].Balance);
    })
    
}