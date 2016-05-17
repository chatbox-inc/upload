"use strict";

const Vue = require("vue");

Vue.config.debug = true;
Vue.config.devtools = true;

/** @type {UploadAPI} */
const upload = require("./upload.js")();

var store = {
    info:{title: "summer memories"},
    list: []
};

const loadImages = ()=>{
    return upload.get();
}

const mainApp = {
    el:"#myapp",
    data: store,
    methods:{
        upload: (file)=>{
            upload.upload(file,store.info,(promise) => {
                promise.then(()=>{
                    loadImages().then((hoge)=>{
                        store.list = hoge;
                    })
                })
            });
        },
        load:()=>{
            loadImages().then((hoge)=>{
                store.list = hoge;
            })
        }
    },
    created: function(){
        this.load();
    }

}

$(()=>{
    Vue.component("image-item",{
        template:"#itemTemplate",
        props:["item"],
        methods:{
            delete:(key)=>{
                upload.remove(key).then(()=>{
                    loadImages().then((hoge)=>{
                        store.list = hoge;
                    })
                });
            }
        }
    })
    const app = new Vue(mainApp)

    // ファイルボタンの偽装
    $(".fileApiBtn").on("click",function(){
        $(".fileApiUploadForm").click();
    });

    // onChange で仮UPLoad
    $(".fileApiUploadForm").on("change",(e)=>{
        const file = e.target.files[0];
        app.upload(file);
    });

    //画像クリックで削除
    $(document).on("click",".imageBtn",(event,hoge,piyo)=>{
    })
})