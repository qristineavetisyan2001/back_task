
function next_products(x, y, z, k){
    count++;
    if(count == products.length - 4){
        count = 0;
        prroducts.style.marginLeft = 0;
        prroducts_marginLeft = 0;
    }
    else{
        prroducts_marginLeft -= pr_width;
        prroducts.style.marginLeft = prroducts_marginLeft;
    }
}
function prev_products(){
    if(count == 0){
        count = products.length - 5;
        prroducts_marginLeft = pr_width * count * (-1);
        prroducts.style.marginLeft = prroducts_marginLeft;
    }
    else{
        --count;
        prroducts_marginLeft += pr_width;
        prroducts.style.marginLeft = prroducts_marginLeft;
    }
}
