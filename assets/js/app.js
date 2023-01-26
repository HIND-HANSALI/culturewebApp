
let lenght = 1;

$('#txtLenght').val(lenght); 
function Getpost(id ,categorie){
 // Afficher le boutton edit
 document.getElementById('savePost').style.display = 'none';
 document.getElementById('updatePost').style.display = 'block';

 //get value id hidden
document.getElementById('IdInputhidden').value=id;

document.getElementById('TitleModal').innerText='Update Post';    
document.getElementById('TitleInput').value=document.querySelector(`#PostTitle${id}`).innerText;
// document.getElementById('tiny').value=document.querySelector(`#PostContent${id}`).innerText;

tinymce.activeEditor.setContent(document.querySelector(`#PostContent${id}`).innerText);
// document.getElementById('CategorieInput').value=document.querySelector(`#PostCategorie${id}`);
document.getElementById('CategorieInput').value= categorie;


// let picTitle = document.querySelector(`#PostPicture${id}`).getAttribute('src');
// document.querySelector("imgedit").setAttribute('src', picTitle);
// console.log(picTitle)

// Get the src attribute of the selected image
let picTitle = document.getElementById(`PostPicture${id}`).getAttribute('src');

// Select the image element you want to update
let imageToUpdate = document.getElementById("image-edite");
imageToUpdate.removeAttribute('hidden');

// Set the src attribute of the imageToUpdate element to the value of picTitle
imageToUpdate.setAttribute('src', picTitle);

// console.log("Selected Image SRC : ", picTitle); // check the selected image src
// console.log("Image Updated SRC : ", imageToUpdate.getAttribute("src")); // check the update image src





// document.getElementById('PictureInput').setAttribute('src', picTitle);
document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
document.getElementById('ValidatePicture').innerText = 'Photo précédente deja selectionné ! Si vous voulez changer la photo veuillez entrer une nouvelle photo !!';

}
function GetCategorie(id){
 // Afficher le boutton edit
 document.getElementById('saveCategorie').style.display = 'none';
 document.getElementById('updateCategorie').style.display = 'block';

 document.getElementById('IdInputhidden').value=id;

document.getElementById('TitleModal').innerText='Update Categorie';
document.getElementById('TitleInput').value=document.querySelector(`#CategorieTitle${id}`).innerText;
}



function multiSave(){
    lenght++;
    document.getElementById('anothetModel').innerHTML+=`<div class="modal-content background ">
    
    <div class="modal-body pt-0 pb-1">
        <form  id="form"  method="POST"  enctype="multipart/form-data">
        <input type="hidden" id="IdInputhidden" name="id" value="" />

        <div class="mb-3">
        <label for="formFile" class="form-label">Picture</label>
        <input class="form-control" type="file" id="formFile2" name="my_image[]">
        </div>
          
        <div class="mb-0">
                <label class="col-form-label">title</label>
                <input type="text" class="form-control" id="TitleInput2" name="title[]" />
                <div id="ValidateTitle"></div>
            </div>
       
        <div class="mb-3">
                <label for="FormControlTextarea1">Example content</label>
                <textarea class="form-control" id="tiny"  name="content[]" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="modal-title my-2" id="exampleModalLabel">Categorie</label>
            <select class="form-select" id="CategorieInput${lenght}" name="categorie[]" aria-label="Default select example">
                
            </select>

        </div>

        </form>
    </div>
    <button class="btn btn-sm btn-danger" id="btnRemove">Delete</button>
    </div>`;
$('#txtLenght').val(lenght); 
console.log(lenght);
remlireSelect();

}

$('body').on('click','#btnRemove',function(){
    $(this).closest('div').remove();
    lenght--;
    $('#anothetModel').val(lenght);
    document.getElementById('txtLenght').value = lenght ;
});

function remlireSelect(){
    let Categorie = document.getElementById('CategorieInput'+lenght);
    // console.log(Categorie);
    let cat = document.getElementById('CategorieInput').children;
    // console.log(cat);
    
    for(let i= 0 ; i < cat.length ; i++){
        let option = document.createElement("option");
        
        option.text  = cat[i].text;
        option.value = cat[i].value;
        Categorie.appendChild(option);
    }
}


// form validation modal
function showEroor(input, message){
    let formControl = input.parentElement ;
    input.classList.add('border-danger') ;
    let small = formControl.querySelector("small") ;
    small.classList.add("text-danger") ;
    small.innerText = message ;
}

function showSuccess(input){
    input.classList.add("border-success")
}

let btn = document.getElementById("savePost") ;
let title = document.getElementById("TitleInput") ;
let image = document.getElementById("PictureInput") ;
// let description = document.getElementById("description") ;
let select = document.getElementById("CategorieInput") ;


btn.addEventListener('click', (e)=>{
    if(title.value == ""){
        e.preventDefault() ;
        showEroor(title, "title is required !!")
    }else{
        showSuccess(title, "title is good")
    }
    if(image.value == ""){
        e.preventDefault() ;
        showEroor(image, "Image is required !!")
    }
    // if(description.value == ""){
    //     e.preventDefault() ;
    //     showEroor(description, "description is required !!")
    // }
    if(select.value == ""){
        e.preventDefault() ;
        showEroor(select, "Please select  !!")
    }

})