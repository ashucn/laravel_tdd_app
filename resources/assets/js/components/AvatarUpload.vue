<template>
  <div class="Image-upload-wrapper Image-upload">
    <div id="croppie"></div>
    <div id="upload-wrapper">
      <button class="btn btn-primary btn-sm"
        v-on:click="showModal">
        <i class="fa fa-camera"></i> Upload image
      </button>

      <div class="Modal" v-if="modalVisible">
        <h4>Upload an Image</h4>
        <div class="input-file">
          <input name="image-upload" type="file" id="upload-image" v-on:change="setUpFileUploader">
        </div>

        <button class="btn btn-success" id="uploadFileCall" v-on:click="uploadFile">
          <i class="fa" v-bind:class="button.class"></i> {{button.name}}
        </button>

        <button class="btn btn-warning" v-on:click="cancelUpload">
          <i class="fa fa-times"></i> Cancel
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Croppie from 'croppie'
import {uploadProfilePic} from './../config'
console.log("uploadProfilePic", uploadProfilePic);
 export default {
    props: ['imgUrl'],
    mounted () {
      this.$on('imgUploaded', function (imageData) {
        this.image = imageData
        this.croppie.destroy()
        this.setUpCroppie(imageData)
      })
      this.image = this.imgUrl
      this.setUpCroppie()
    },
    data () {
      return {
        button: {
          name: 'Upload',
          class: 'fa-upload'
        },
        showZoomer: false,
        canUpload: true,
        modalVisible: false,
        croppie: null,
        image: null
      }
    },
    methods: {
        showModal (){
            this.modalVisible = this.modalVisible == true ? false : true;
        },
      uploadFile () {
        this.canUpload = false
        this.button = {
          name: 'Uploading...',
          class: 'fa-refresh fa-spin'
        }
        this.croppie.result({
          type: 'canvas',
          size: 'viewport'
        }).then((response) => {
          this.image = response
          this.$http.post(uploadProfilePic, {file: this.image})
            .then((response) => {
                console.log("response", response);
                if(response.status == 201){
                    toastr.options.positionClass = "toast-bottom-right";
                    toastr.success("update avatar successfully");
                }
              this.canUpload = true
              this.modalVisible = false
              $(".cr-slider-wrap").hide();
              this.button = {
                name: 'Upload',
                class: 'fa-upload'
              }
            })
        })
      },
      setUpCroppie () {
        let el = document.getElementById('croppie')
        this.croppie = new Croppie(el, {
          viewport: { width: 200, height: 200, type: 'circle' },
          boundary: { width: 220, height: 220 },
          showZoomer: this.showZoomer,
          enableOrientation: true
        })
        this.croppie.bind({
          url: this.image
        })
      },
      setUpFileUploader (e) {
        let files = e.target.files || e.dataTransfer.files
        if (!files.length) {
          return
        }
        this.createImage(files[0])
        this.showZoomer = true
      },
      createImage (file) {
        var image = new Image()
        var reader = new FileReader()
        var vm = this
        reader.onload = (e) => {
          vm.image = e.target.result
          vm.$emit('imgUploaded', e.target.result)
        }
        reader.readAsDataURL(file)
      },
      cancelUpload(){
        this.modalVisible = false;
        $(".cr-slider-wrap").hide();
      }
    }
  }
</script>

<style lang="scss">
  .Image-upload {
    .Modal {
      border-top: 1px solid #f4f4f4;
      margin-top: 10px;
      h4 {
        margin-bottom: 20px;
      }
    }
    div#upload-wrapper {
      text-align: center;
    }
    .input-file {
      text-align: left;
      width: 220px;
      margin: 0px auto;
      margin-bottom: 20px;
    }
  }
</style>
