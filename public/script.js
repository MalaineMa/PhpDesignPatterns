
reloadPage = (target)=>{
    let val =target.value;
    if(val == '')
        window.location= '/'
    else
        window.location= '/?bouquet='+val;
}