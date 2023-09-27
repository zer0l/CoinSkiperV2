export default class WalletClass{
    constructor(Wallet){
        this._Wallet = Wallet;
        this._idWallet = Wallet.id;
        this._Balance = Wallet.balance;
        this._Name = Wallet.name;
    }

    get FullInfo(){
        return this._Wallet;
    }

    get ID(){
        return this._idWallet;
    }

    // set ID(value){
    //     this._Balance = value;
    // }

    get Balance(){
        return this._Balance;
    }

    set Balance(value){
        // this._Balance = value;
    }

    get Name(){
        return this._Name;
    }

    set Name(value){

    }
}
