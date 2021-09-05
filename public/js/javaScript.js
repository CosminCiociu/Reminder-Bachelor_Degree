const articles = document.getElementById('booksTable')

if(articles){
    articles.addEventListener('click',e=>{
        if(e.target.className === 'btn btn-danger')
        {
            if(confirm('Are you sure?') == true){
                return true;
                // const id = e.target.getAttribute('data-id');
                // fetch('/admin/deletebook/${id}',{
                //     methode: 'DELETE'
                // }).then(res => window.location.reload())
            }
            else{
                e.preventDefault();
            }
        }
    })
}