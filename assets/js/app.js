
function Getpost(id,categorie){
 // Afficher le boutton edit
 document.getElementById('savePost').style.display = 'none';
 document.getElementById('updatePost').style.display = 'block';

 //get value id hidden
document.getElementById('IdInputhidden').value=id;

document.getElementById('TitleModal').innerText='Update Post';    
document.getElementById('TitleInput').value=document.querySelector(`#PostTitle${id}`).innerText;
document.getElementById('tiny').value=document.querySelector(`#PostContent${id}`).innerText;
// document.getElementById('CategorieInput').value=document.querySelector(`#PostCategorie${id}`);
document.getElementById('CategorieInput').value=categorie;

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
    document.getElementById('anothetModel').innerHTML+=`<div class="modal-content background ">
            
    <div class="modal-body pt-0 pb-1">
        <form  id="form"  method="POST"  enctype="multipart/form-data">
        <input type="hidden" id="IdInputhidden" name="id" value="" />

        <div class="mb-3">
        <label for="formFile" class="form-label">Picture</label>
        <input class="form-control" type="file" id="formFile" name="my_image">
        </div>
          
        <div class="mb-0">
                <label class="col-form-label">title</label>
                <input type="text" class="form-control" id="TitleInput" name="title" />
                <div id="ValidateTitle"></div>
            </div>
       
        <div class="mb-3">
                <label for="FormControlTextarea1">Example content</label>
                <textarea class="form-control" id="tiny"  name="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="modal-title my-2" id="exampleModalLabel">Categorie</label>
            <select class="form-select" id="CategorieInput" name="categorie" aria-label="Default select example">
                <option selected>Please select </option>    
               
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
            <div class="modal-footer">
            <span id="savePosts" onclick="multiSave()" name="savePosts" class="btn btn-primary">Save Other</span>
                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                <button id="savePost" type="submit" name="savePost" class="btn btn-primary">Save</button>
                <div id="editPosts" >
                    <button style="display: none" id="updatePost" type="submit" name="updatePostForm" class="btn btn-warning text-black">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>`;

}