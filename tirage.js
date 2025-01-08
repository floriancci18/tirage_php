let submit = document.getElementById('tirage');
submit.addEventListener('submit',function(event){
    event.preventDefault();
    const form = event.currentTarget;
  
    let resultat = document.getElementById('resultat');
    this.style.display = 'none';
    let compteur = 5;
    const compte = () =>{
        const interval = setInterval(() =>{
            resultat.innerText = compteur;;
            if(compteur==0){
               form.submit();
                
            }else{
                compteur--;
            }
        },1000);
    }
    compte();
});