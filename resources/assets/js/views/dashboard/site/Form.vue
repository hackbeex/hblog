<template>
    <div class="row">
        <form class="form-horizontal col-md-9 col-md-offset-1" @submit.prevent="onSubmit">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea id="editor"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">{{ $t('form.edit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { default as SimpleMDE } from 'simplemde/dist/simplemde.min'
import { stack_error } from 'config/helper'
import FineUploader from 'fine-uploader/lib/traditional'

export default {
    props: {
        about: {
            type: Object,
            default() {
                return {
                    content: ''
                }
            }
        }
    },
    data() {
        return {
            simplemde: '',
            content: '',
        }
    },
    computed: {
    },
    watch: {
        article() {
            this.simplemde.value(this.article.content);
        }
    },
    mounted() {
        let t = this.$t;

        this.simplemde = new SimpleMDE({
            element: document.getElementById("editor"),
            autoDownloadFontAwesome: true,
            forceSync: true
        });

        this.contentUploader()
    },
    methods: {
        onSubmit() {
            this.article.content = this.simplemde.value();
            this.$http.post(url, this.article)
                .then((response) => {
                    toastr.success('You edit the about-me success!');
                }).catch(({response}) => {
                    stack_error(response);
                })
        },
        contentUploader() {
            let vm = this;

            this.simplemde.codemirror.on('paste', function(editor, event){
              if (event.clipboardData.types.indexOf("Files") >= 0) {
                event.preventDefault();
              }
            });

            let contentUploader = new FineUploader.FineUploaderBasic({
                paste: {
                    targetElement: document.querySelector('.CodeMirror')
                },
                request: {
                    endpoint: '/api/file/upload',
                    inputName: 'image',
                    customHeaders: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    params: {
                      strategy: 'about'
                    }
                },
                validation: {
                    allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
                },
                callbacks: {
                    onPasteReceived(file) {
                        let promise = new FineUploader.Promise();

                        if (file === null || typeof file.type === 'undefined' || file.type.indexOf('image/')) {
                            toastr.error('Only can upload image!');
                            return promise.failure('not a image.');
                        }

                        return promise.then(() => {
                            vm.createdImageUploading('image.png');
                        }).success('image')
                    },
                    onComplete(id, name, responseJSON) {
                        vm.replaceImageUploading(name, responseJSON.url);
                    },
                },
            });

            let dragAndDropModule = new FineUploader.DragAndDrop({
                dropZoneElements: [document.querySelector('.CodeMirror')],
                callbacks: {
                    processingDroppedFilesComplete(files, dropTarget) {
                        files.forEach((file) => {
                            vm.createdImageUploading(file.name)
                        });
                        contentUploader.addFiles(files); //this submits the dropped files to Fine Uploader
                    }
                }
            });
        },
        getImageUploading() {
          return '\n![Uploading ...]()\n'
        },
        createdImageUploading(name) {
            this.simplemde.value(this.simplemde.value() + this.getImageUploading())
        },
        replaceImageUploading(name, url) {
            let result = '\n!['+name+']('+url+')\n';

            this.simplemde.value(this.simplemde.value().replace(this.getImageUploading(), result))
        },
    }
}
</script>

<style lang="scss" scoped>
.cover-upload {
    display: inline-block;
    .file {
        position: relative;
        margin: 0 auto;
        display: block;
        width: 100px;
        height: 41px;
        line-height: 41px;
        font-size: 12px;
        span {
          display: block;
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
        }
        input {
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          width: 100px;
          height: 30px;
          opacity: 0;
        }
    }
}
</style>