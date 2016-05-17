"use strict"

const request = require("superagent")

class UploadAPI{

    get(){
        const handler = (resolve,reject)=>{
            request.get("/api/upload")
                .end((error,response)=>{
                    if(error){
                        reject(error)
                    }else{
                        resolve(response.body);
                    }
                })
        }

        return new Promise(handler)
    }

    post(file,info){
        const handler = (resolve,reject)=>{
            request.post("/api/upload")
            .send({
                file,
                info
            })
            .end((error,response)=>{
                if(error){
                    reject(error)
                }else{
                    resolve(response.body);
                }
            })
        }

        return new Promise(handler)
    }

    put(){
        console.log("this is put",arguments);
    }

    remove(key){
        const handler = (resolve,reject)=>{
            request.delete("/api/upload")
                .send({
                    key
                })
                .end((error,response)=>{
                    if(error){
                        reject(error)
                    }else{
                        resolve(response.body);
                    }
                })
        }

        return new Promise(handler)
    }

    upload(file,metaInfo,cb){
        const onload = (event) => {
            const fileInfo = {
                origin: file.name,
                size: file.size,
                mime: file.type,
                data: event.target.result
            }
            cb( this.post(fileInfo,metaInfo) )
        }

        const reader = new FileReader();
        reader.onload = onload;
        reader.readAsDataURL(file);
        reader;
    }
}

module.exports = function(){
    return new UploadAPI();
}