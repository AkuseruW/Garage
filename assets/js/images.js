window.onload = () => {

    let links = document.querySelectorAll("[data-delete]")

    for(link of links){

        link.addEventListener("click", function(e){

            e.preventDefault()
            
            //confirmation
            if(confirm("Voulez-vous supprimer cette image ?")){
                // envoie de la requête Ajax vers le lien 
                
                console.log(this.getAttribute("href"))
                // console.log(JSON.parse(this.getAttribute("href")))

                fetch(JSON.parse(this.getAttribute("href")), {
                    method: "DELETE",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({"_token": this.dataset.token})
                }).then(
                    //réponse en JSON
                    response => response.json()
                ).then(data => {
                    if(data.success)
                        this.parentElement.remove()
                    else
                        alert(data.error)
                }).catch(e => alert(e))
            }
        })
    }
}