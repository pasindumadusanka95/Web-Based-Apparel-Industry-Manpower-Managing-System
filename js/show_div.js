function show_div(divID){
    document.getElementById(divID).style.display="block";
}
function hide_div(divID){
    document.getElementById(divID).style.display="none";
}
function change_col(id){
    document.getElementById(id).className="col-lg-7 connectedSortable";
}
function change_col_2(id){
    document.getElementById(id).className="col-lg-12 connectedSortable";
}