let SelectedWallet = 0;

document.addEventListener('click',(e)=>{
  if(e.target.classList.contains("wallet")){
    if(SelectedWallet === 0){
      SelectedWallet = e.target.dataset.wallet;
      e.target.classList.toggle("wallet-active");
      return;
    }
    if(SelectedWallet === e.target.dataset.wallet){
      document.querySelectorAll('.wallet-active').forEach(element => {
        element.classList.toggle("wallet-active");
      })
      SelectedWallet = 0;
      return;
    }
    else{
      document.querySelectorAll('.wallet-active').forEach(element => {
        element.classList.toggle("wallet-active");
      })
      SelectedWallet = e.target.dataset.wallet;
      e.target.classList.toggle("wallet-active");
    }
  }

  if(e.target.classList.contains("expenses")){
    if(SelectedWallet != 0){
      prompt(`Выбранный кошелек : ${SelectedWallet}. Выбранные расходы : ${e.target.dataset.expenses}`,"");
      return;
    }else{
      alert("Откроется модальное окно с подробными расходами")
    }
  }
})