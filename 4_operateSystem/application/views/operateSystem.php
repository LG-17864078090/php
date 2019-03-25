<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>操作系统</title>
    <link rel="stylesheet" href="css/operateSystem.css">
</head>
<body>
<div id="app" class="wrapper">
    <h1 class="title">操作系统模拟</h1>
    <div class="allProcess">
        <div class="menu-container">
            <span>请输入名称:</span>
            <input type="text" v-model="processName">
            <span>大小:</span>
            <input type="text" v-model="processSize">
            <h2 class="menu-item" @click="creat">创建进程</h2>
            <h2 class="menu-item" @click="timeUp">时间片到</h2>
            <h2 class="menu-item" @click="block">进程阻塞</h2>
            <h2 class="menu-item" @click="weakUp">唤醒进程</h2>
            <h2 class="menu-item" @click="endUp">结束进程</h2>
            <h2 class="menu-item requestDevice" @click="requestDevice">申请设备</h2>
            <h2 class="menu-item releaseDevice" @click="releaseDevice">释放设备</h2>
        </div>

        <div class="showMsg">
            <h2 class="msgTitle">队列信息</h2>
            <div class="showMsg-queue">
                <div class="showMsg-ready">
                    <h3>--就绪队列--</h3>
                    <li v-for="val in ready">
                        <span>{{val.name}}</span>
                        <span>size:{{val.size}}</span>
                    </li>
                </div>
                <div class="showMsg-blocked">
                    <h3>--阻塞队列--</h3>
                    <li v-for="val in blocked">
                        <span>{{val.name}}</span>
                        <span>size:{{val.size}}</span>
                    </li>
                </div>
                <div class="showMsg-running">
                    <h3>--运行队列--</h3>
                    <li v-for="val in running">
                        <span>{{val.name}}</span>
                        <span>size:{{val.size}}</span>
                    </li>
                </div>
                <div class="showMsg-finish">
                    <h3>--完成队列--</h3>
                    <li v-for="val in finish">
                        <span>{{val.name}}</span>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="showMemoryDetail">
        <button @click=(memoryIsShow=!memoryIsShow) class="OFF_ON">位示图</button>
        <div class="pageExcel" v-if="memoryIsShow">
            <h3>页表</h3>
            <table>
                <thead>
                <tr><th>页号</th><th>块号</th><th>交换空间</th><th>存在位</th></tr>
                </thead>
                <tbody v-for="val in running">
                <tr v-for="page in val.page">
                    <td>{{page.page}}</td>
                    <td>{{page.piece}}</td>
                    <td>{{page.swap}}</td>
                    <td>{{page.exist}}</td>
                </tr>
                </tbody>
            </table>
            <input type="text" v-model="callSwapPage">
            <button @click="FIFO">SWAP</button>
            <h4 class="pageFaultRate">缺页率: {{this.inSwap}} / {{this.inSwap+this.inMemory}}</h4>
        </div>

        <div class="memory" v-if="memoryIsShow">
            <div class="memoryMap">
                <h3>内存位示图</h3>
                <span v-for="val in memory">{{val}}</span>
            </div>
        </div>

        <div class="swap" v-if="memoryIsShow">
            <div class="swapSpace">
                <h3>交换空间</h3>
                <span v-for="val in swapSpace">{{val}}</span>
            </div>
        </div>
    </div>
    <div class="IOdevice">
        <button @click=(deviceIsShow=!deviceIsShow) class="OFF_ON">设备</button>
        <div class="showDevice" v-if="deviceIsShow">
            <div class="channel">
                <li v-for="val in channel">
                    <h4 class="id">
                        {{val.id}}
                    </h4>
                    <div class="detail">
                        <p>是否空闲: {{val.isFree}}</p>
                        <p>占用进程: {{val.process}}</p>
                        <p>
                            等待队列:<span v-for="wait in val.waiting">{{wait.name}} </span>
                        </p>
                    </div>

                </li>
            </div>
            <div class="control" >
                <li v-for="val in control">
                    <h4 class="id">
                        {{val.id}}
                    </h4>
                    <div class="detail">
                        <p>是否空闲: {{val.isFree}}</p>
                        <p>占用进程: {{val.process}}</p>
                        <p>上级: {{val.channel.id}}</p>
                        <p>
                            等待队列:<span v-for="wait in val.waiting">{{wait.name}} </span>
                        </p>
                    </div>
                </li>
            </div>
            <div class="device">
                <li v-for="val in device">
                    <h4 class="id">
                        {{val.id}}
                    </h4>
                    <div class="detail">
                        <p>是否空闲:{{val.isFree}}</p>
                        <p>占用进程:{{val.process}}</p>
                        <p>上级:{{val.control.id}}</p>
                        <p>
                            等待队列:<span v-for="wait in val.waiting">{{wait.name}} </span>
                        </p>
                    </div>
                </li>
            </div>
        </div >
        <div class="oprateDevice"  v-if="deviceIsShow">
            <span>ID:</span><input type="text" v-model="DCCid">
            <span>上级:</span><input type="text" v-model="DCparent">
            <button @click="addChannel">添加通道</button>
            <button @click="delChannel">删除通道</button>
            <button @click="addControl">添加控制器</button>
            <button @click="delControl">删除控制器</button>
            <button @click="addDevice">添加设备</button>
            <button @click="delDevice">删除设备</button>
        </div>
    </div>
    <div class="file">
        <button @click=(fileIsShow=!fileIsShow) class="OFF_ON">文件</button>
        <div v-if="fileIsShow">
            <div class="outMemory">
                <div class="outMemoryMap">
                    <h3>外存位示图</h3>
                    <span v-for="val in outMemory">{{val}}</span>
                </div>
                <div class="fileOperating">
                    <button @click="creatFolder">创建目录</button>
                    <button @click="creatFile">创建文件</button>
                </div>
            </div>
            <div class="showFile">
                <div class="fileFolder">
                    <img src="images/文件夹.png" alt="">
                    <h3>{{this.nowFOLDER.name}}</h3>
                    <h3>{{this.nowFOLDER.size}}</h3>
                    <h3 class="creatTime">{{this.nowFOLDER.creatTime}}</h3>
                    <img src="images/返回.png" class="back" alt="" @click="back">
                </div>
                <div class="fileList">
                    <div class="fileListItem" v-for="(folder,index) in nowFolders" @click="updateFileShow(folder)">
                        <img src="images/文件夹.png" alt="">
                        <span>{{folder.name}}</span>
                        <span>{{folder.size}}</span>
                        <span>{{folder.creatTime}}</span>
                        <button @click="deleteFolder(folder,index)">删除</button>
                    </div>
                    <div class="fileListItem" v-for="(file,index) in nowFiles">
                        <img src="images/文件.png" alt="">
                        <span>{{file.name}}</span>
                        <span>{{file.size}}</span>
                        <span>{{file.creatTime}}</span>
                        <button @click="deleteFile(file,index)">删除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scheduling">
        <button @click=(scheduleIsShow=!scheduleIsShow) class="OFF_ON">调度</button>
        <div v-if="scheduleIsShow">
            <div class="schedulingButton">
                <button @click="FCFS">FCFS</button>
                <button @click="SJF">SCF</button>
                <button @click="timePiece">时间片调度</button>
            </div>
            <div class="showTime">
                <div class="item" v-for="val in finish">
                    <li>name：{{val.name}}</li>
                    <li>到达时间：{{val.arrival_time}}</li>
                    <li>服务时间：{{val.burst_time}}</li>
                    <li>结束时间：{{val.finished_time}}</li>
                    <li>周转时间：{{val.finished_time-val.arrival_time}}</li>
                    <li>带权周转：{{(val.finished_time-val.arrival_time)/val.burst_time}}</li>
                </div>
            </div>
            <div>
                <p>平均周转时间：{{averageBurstTime}}</p>
                <p>平均带权周转时间：{{averageBurstTimeWithWeight}}</p>
            </div>
        </div>



    </div>
</div>

<script src="js/vue.js"></script>
<script>
    //进程数据结构
    class PCB {
        constructor(name,size,arrival_time,burst_time){
            this.name=name;
            this.size=size;
            this.page=[];
            this.arrival_time=arrival_time;		//到达时间
            this.burst_time=burst_time;		//服务时间
            this.remaing_time=burst_time;   //剩余服务时间
            this.finished_time=0;
        }
    }

    //页表数据结构
    class PAGE{
        constructor(page,piece,swap,exist){
            this.page=page;
            this.piece=piece;
            this.swap=swap;
            this.exist=exist;
        }
    }

    //通道数据结构
    class CHANNEL{
        constructor(id){
            this.id=id;
            this.isFree=true;
            this.process='';
            this.waiting=[];
        }
    }

    //控制器数据结构
    class CONTROL{
        constructor(id,CHANNEL){
            this.id=id;
            this.isFree=true;
            this.process='';
            this.waiting=[];
            this.channel=CHANNEL;
        }
    }

    //设备数据结构
    class DEVICE{
        constructor(id,CONTROL){
            this.id=id;
            this.isFree=true;
            this.process='';
            this.waiting=[];
            this.control=CONTROL;
        }
    }

    //文件数据结构
    class FILE{
        constructor(name,size,FOLDER,creatTime){
            this.name = name;
            this.size = size;
            this.folder = FOLDER;
            this.firstBlock='';
            this.position = [];
            this.creatTime = creatTime;
        }
    }

    //文件夹数据结构
    class FOLDER{
        constructor(name,size,FOLDER,creatTime){
            this.name = name;
            this.size = size;
            this.folder = FOLDER;
            this.firstBlock='';
            this.position = [];
            this.creatTime = creatTime;
        }
    }

    var vm = new Vue({
        el:'#app',
        data:{
            processName:'',//进程名称
            processSize:'',//进程大小
            DCCid:'',//设备控制器通道ID
            DCparent:'',//设备通道父级ID
            callSwapPage:'',//物理地址
            memoryIsShow:false,//位示图显示开关
            deviceIsShow:false,//设备显示开关
            fileIsShow:false,//文件显示开关
            scheduleIsShow:false,//调度显示开关
            inMemory:0,//记录所访问块在内存次数
            inSwap:0,//记录所访问块在交换空间次数
            physicalMemory:3,//可用内存块大小
            ready:[],//就绪队列
            blocked:[],//阻塞队列
            running:[],//运行队列
            finish:[],//完成队列
            allPCB:[],//全部进程
            memory:[],//内存位示图
            swapSpace:[],//交换空间位示图
            outMemory:[],//外存位示图
            channel:[],//通道
            control:[],//控制器
            device:[],//设备
            files:[],//文件
            folders:[],//文件夹
            nowFOLDER:'',//当前父文件夹
            nowFiles:[],//当前文件夹下的文件
            nowFolders:[],//当前文件夹下的文件夹
        },
        //钩子函数
        created(){
            this.creatMap();
            this.creatSwapSpace();
            this.creatOutMemory();
            this.creatDCC();
            this.addPCB();
        },
        computed:{     //计算属性
            averageBurstTime(){
                let sum = 0;
                for(let i=0;i<this.finish.length;i++){
                    sum+=this.finish[i].finished_time-this.finish[i].arrival_time;
                }
                return sum/this.finish.length;
            },
            averageBurstTimeWithWeight(){
                let sum = 0;
                for(let i=0;i<this.finish.length;i++){
                    sum+=(this.finish[i].finished_time-this.finish[i].arrival_time)/this.finish[i].burst_time;
                }
                return sum/this.finish.length;
            }

        },
        methods:{
            addPCB(){
                // let PCBTemp1 = new PCB("A",11,12,2);
                // let PCBTemp2 = new PCB("B",22,6,5);
                // let PCBTemp3 = new PCB("C",33,8,4);
                // let PCBTemp4 = new PCB("D",44,4,7);
                // this.allPCB.push(PCBTemp1,PCBTemp2,PCBTemp3,PCBTemp4);
            },

            //调度————先来先服务
            FCFS(){
                this.running.splice(0);
                this.finish.splice(0);
                this.allPCB.sort(function (a,b) {
                    return a.arrival_time-b.arrival_time;
                });
                for(let i=0;i<this.allPCB.length;i++){
                    setTimeout(()=>{
                        if(i==0){
                            this.running.splice(0,0,this.allPCB[i]);
                            this.allPCB[i].finished_time=this.allPCB[i].arrival_time+this.allPCB[i].burst_time;
                        }else{
                            this.running.splice(0,1,this.allPCB[i]);
                            if(this.allPCB[i-1].finished_time>=this.allPCB[i].arrival_time){
                                this.allPCB[i].finished_time=this.allPCB[i-1].finished_time+this.allPCB[i].burst_time;
                            }else{
                                this.allPCB[i].finished_time=this.allPCB[i].arrival_time+this.allPCB[i].burst_time;
                            }
                        }
                        this.running.splice(0);
                        this.finish.push(this.allPCB[i]);
                        this.ready=[...this.allPCB];
                        this.ready.splice(0,i+1);
                    },1000*i);
                }
            },

            //调度——短作业优先
            SJF(){
                this.running.splice(0);
                this.finish.splice(0);
                let waiting=[];
                waiting = [...this.allPCB];
                waiting.sort(function (a,b) {
                    return a.arrival_time-b.arrival_time;
                });
                this.running.splice(0,0,waiting[0]);
                waiting[0].finished_time=waiting[0].arrival_time+waiting[0].burst_time;
                this.finish.push(waiting[0]);
                waiting.splice(0,1);
                waiting.sort(function (a,b) {
                    return a.burst_time-b.burst_time;
                });
                console.log(waiting);

                for(let i=0;i<waiting.length;i++){
                    if((waiting[i].arrival_time<=this.finish[this.finish.length-1].finished_time)||(i==waiting.length-1)){
                        this.running.splice(0,1,waiting[i]);
                        waiting[i].finished_time = this.finish[this.finish.length-1].finished_time+waiting[i].burst_time;
                        this.finish.push(waiting[i]);
                        waiting.splice(i,1);
                        this.ready=[...waiting];
                        i=-1;
                    }
                }
            },

            //调度——时间片
            timePiece(){
                this.finish.splice(0);
                let PCBArr = [];
                this.allPCB.forEach((val,index)=>{
                    PCBArr[index] = new PCB(val.name,val.size,val.arrival_time,val.burst_time);
                });

                let timePiece = prompt("请输入时间片大小")*1;
                let MAX_burst_time=0;
                PCBArr.forEach((val)=>{
                    if(val.burst_time>=MAX_burst_time){
                        MAX_burst_time=val.burst_time;
                    }
                });
                PCBArr.sort(function (a,b) {
                    return a.arrival_time-b.arrival_time;
                });
                let finalTime = PCBArr[0].arrival_time;
                while (PCBArr.length){
                    for(let i=0;i<PCBArr.length;i++){
                        if(PCBArr[i].arrival_time<=finalTime){
                            // 执行顺序
                            console.log("当前时间",finalTime);
                            console.log("到达时间",PCBArr[i].arrival_time, "名称",PCBArr[i].name, "剩余时间",PCBArr[i].remaing_time);
                            if(PCBArr[i].remaing_time>timePiece){
                                PCBArr[i].remaing_time-=timePiece;
                                finalTime+=timePiece;
                            }else{
                                PCBArr[i].finished_time=finalTime+PCBArr[i].remaing_time;
                                finalTime+= PCBArr[i].remaing_time;
                                PCBArr[i].remaing_time=0;

                                this.finish.push(PCBArr[i]);
                                PCBArr.splice(i,1);
                                i=i-1;
                            }
                        }
                    }
                }
            },


            //文件或者文件夹存入外存
            saveToOutMemory(FileOrFolder){
                let blockNum = Math.ceil(FileOrFolder.size/1024);
                for(let i=0;i<blockNum;i++){
                    for(let j=0;j<64;j++){
                        if(this.outMemory[j]==0){
                            this.outMemory[j]=11;
                            FileOrFolder.position[i]=j;
                            j=64;
                        }
                    }
                }
                FileOrFolder.firstBlock=FileOrFolder.position[0];
            },

            //删除文件或文件夹
            delelteFromoOutMemory(FileOrFolder){
                for(let i=0;i<FileOrFolder.position.length;i++){
                    this.outMemory[FileOrFolder.position[i]]=0;
                }
            },


            //创建文件
            creatFile(){
                let tmpFileName = prompt("请输入文件名称:",'');
                let flag = true;
                for(let i=0;i<this.nowFiles.length;i++){
                    if(this.nowFiles[i].name == tmpFileName){
                        flag = false;
                    }
                }
                if(flag){
                    let tmpFileSize = prompt("请输入文件大小",'');
                    let tmpFile = new FILE(tmpFileName,tmpFileSize,this.nowFOLDER,this.getTime().toString());
                    this.saveToOutMemory(tmpFile);
                    this.nowFiles.push(tmpFile);
                    this.files.push(tmpFile);
                }else{
                    alert('该目录下已存在'+tmpFileName+'文件');
                }
            },

            //创建文件夹
            creatFolder(){
                let tmpFolderName = prompt("请输入文件夹名称:",'');
                let flag = true;
                for(let i=0;i<this.nowFolders.length;i++){
                    if(this.nowFolders[i].name == tmpFolderName){
                        flag = false;
                    }
                }
                if(flag){
                    let tmpFolderSize = prompt("请输入文件夹大小",'');
                    let tmpFolder = new FOLDER(tmpFolderName,tmpFolderSize,this.nowFOLDER,this.getTime().toString());
                    this.saveToOutMemory(tmpFolder);
                    this.nowFolders.push(tmpFolder);
                    this.folders.push(tmpFolder);
                }else{
                    alert('该目录下已存在'+tmpFileName+'文件夹');
                }
            },

            //判断父文件夹是否存在  存在返回真
            folderIsExist(FileOrFolder){
                for(let i=0;i<this.folders.length;i++){
                    if(FileOrFolder.folder == this.folders[i]){
                        return true;
                    }else{
                        return false;
                    }
                }
            },

            //删除文件夹及其下面内容
            deleteFolder(folder,index){
                this.nowFolders.splice(index,1);
                //删除该文件夹
                for(let i=0;i<this.folders.length;i++){
                    if(this.folders[i].name==folder.name && this.folders[i].creatTime==folder.creatTime){
                        this.delelteFromoOutMemory(this.folders[i]);
                        this.folders.splice(i,1);
                    }
                }

                //删除文件夹下的所有文件夹
                for(let i=0;i<this.folders.length;i++){
                    if(this.folders[i].name!="C" && !this.folderIsExist(this.folders[i])){
                        this.delelteFromoOutMemory(this.folders[i]);
                        this.folders.splice(i,1);
                        i=i-1;
                    }
                }

                //删除该文件夹下的所有文件
                for(let i=0;i<this.files.length;i++){
                    if(!this.folderIsExist(this.files[i])){
                        this.delelteFromoOutMemory(this.files[i]);
                        this.files.splice(i,1);
                        i=i-1;
                    }
                }


                //阻止事件冒泡
                event.stopPropagation();
            },

            //删除文件
            deleteFile(file,index){
                this.nowFiles.splice(index,1);
                for(let i=0;i<this.files.length;i++){
                    if(this.files[i].name==file.name && this.files[i].creatTime==file.creatTime){
                        this.delelteFromoOutMemory(this.files[i]);
                        this.files.splice(i,1);
                    }
                }
            },

            //获取系统当前时间
            getTime(){
                let data = new Date();
                return data.toLocaleString();
                //2018/10/31 上午10:59:08
            },

            //文件夹返回上级
            back(){
                if(this.nowFOLDER.folder!=''){
                    this.updateFileShow(this.nowFOLDER.folder);
                }
            },

            //更新文件显示
            updateFileShow(FOLDER){
                this.nowFOLDER = '';
                this.nowFolders=[];
                this.nowFiles=[];
                this.nowFOLDER = FOLDER;
                for(let i=0;i<this.files.length;i++){
                    if(this.files[i].folder.name == FOLDER.name && this.files[i].folder.creatTime == FOLDER.creatTime){
                        this.nowFiles.push(this.files[i]);
                    }
                }
                for(let i=0;i<this.folders.length;i++){
                    if(this.folders[i].folder.name == FOLDER.name && this.folders[i].folder.creatTime == FOLDER.creatTime){
                        this.nowFolders.push(this.folders[i]);
                    }
                }
            },




            //判断进程输入框内容是否在某队列
            findProcess(arr,temp){
                let flag = true;
                for(let index=0;index<arr.length;index++){
                    if(temp==arr[index].name){
                        flag=false;
                    }
                }
                return flag;
            },

            //通过ID判断DCC是否存在
            findDCCById(ID,arr){
                let flag = false;
                for(let i=0;i<arr.length;i++){
                    if(arr[i].id==ID){
                        flag=true;
                    }
                }
                return flag;
            },

            //生成随机内存
            creatMap(){
                for(let i=0;i<64;i++){
                    this.memory[i] = Math.floor(Math.random() * 2);
                }
            },

            //生成随机交换空间
            creatSwapSpace(){
                for(let i=0;i<128;i++){
                    this.swapSpace[i] = Math.floor(Math.random() * 2);
                }
            },

            //生成随机外存
            creatOutMemory(){
                for(let i=0;i<64;i++){
                    this.outMemory[i] = Math.floor(Math.random() * 2);
                }
                let C = new FOLDER('C',1000,'','2018/10/31 上午10:59:08');
                let user = new FOLDER('user',1000,C,this.getTime().toString());
                let test = new FILE('test',1000,C,this.getTime().toString());
                let test1 = new FILE('test1',1100,user,this.getTime().toString());
                this.saveToOutMemory(C);
                this.saveToOutMemory(user);
                this.saveToOutMemory(test);
                this.saveToOutMemory(test1);

                this.folders.push(C);
                this.nowFOLDER=C;
                this.folders.push(user);
                this.files.push(test);
                this.files.push(test1);
                this.updateFileShow(C);
            },

            //初始化设备，控制器，通道
            creatDCC(){
                let channel_1 = new CHANNEL('通道1');
                let channel_2 = new CHANNEL('通道2');
                let control_1 = new CONTROL('控制器1',channel_1);
                let control_2 = new CONTROL('控制器2',channel_1);
                let control_3 = new CONTROL('控制器3',channel_2);
                let device_1 = new DEVICE('设备1',control_1);
                let device_2 = new DEVICE('设备2',control_1);
                let device_3 = new DEVICE('设备3',control_2);
                let device_4 = new DEVICE('设备4',control_2);
                let device_5 = new DEVICE('设备5',control_3);
                this.channel.push(channel_1);
                this.channel.push(channel_2);
                this.control.push(control_1);
                this.control.push(control_2);
                this.control.push(control_3);
                this.device.push(device_1);
                this.device.push(device_2);
                this.device.push(device_3);
                this.device.push(device_4);
                this.device.push(device_5);
            },

            //进程存入内存与交换空间
            saveToMemory(PCB,memoryMap,swapSpaceMap,physicalMemory){
                if(PCB.page.length==0){
                    //计算进程所需内存块数
                    let pageCount = Math.ceil(PCB.size/1024);
                    if(pageCount<physicalMemory){
                        //小于三块直接存入内存
                        for(let i=0;i<pageCount;i++){
                            for(let j=0;j<64;j++){
                                if(memoryMap[j]==0){
                                    memoryMap[j]=11;
                                    let PageTemp = new PAGE(i,j,-1,1);
                                    PCB.page[i]=PageTemp;
                                    j=64;
                                }
                            }
                        }
                    }else{
                        //大于三块前三位存进物理内存
                        for(let i=0;i<physicalMemory;i++){
                            for(let j=0;j<64;j++){
                                if(memoryMap[j]==0){
                                    memoryMap[j]=11;
                                    let PageTemp = new PAGE(i,j,-1,1);
                                    PCB.page[i]=PageTemp;
                                    j=64;
                                }
                            }
                        }
                        //后面的存入交换空间
                        for(let i=physicalMemory;i<pageCount;i++){
                            for(let j=0;j<128;j++){
                                if(swapSpaceMap[j]==0){
                                    swapSpaceMap[j]=11;
                                    let PageTemp = new PAGE(i,-1,j,0);
                                    PCB.page[i]=PageTemp;
                                    j=128;
                                }
                            }
                        }
                    }
                }


            },

            //内存与交换空间释放
            releaseMemory(PCB,memoryMap,swapSpaceMap,physicalMemory){
                let pageCount = PCB.page.length;
                if(pageCount<physicalMemory){
                    for(let i=0;i<PCB.page.length;i++){
                        memoryMap[PCB.page[i].piece]=0;
                    }
                    PCB.page=[];
                }else{
                    for(let i=0;i<physicalMemory;i++){
                        memoryMap[PCB.page[i].piece]=0;
                    }
                    for(let i=physicalMemory;i<pageCount;i++) {
                        swapSpaceMap[PCB.page[i].swap]=0;
                    }
                    PCB.page=[];
                }

            },

            //重置缺页率
            resetPageFaultRate(){
                this.inSwap=0;
                this.inMemory=0;
                this.callSwapPage='';
            },

            //(先进先出FIFO算法)内存与交换空间交换内容
            FIFO(){
                if(this.running.length){
                    let callSwapPageIndex=0;
                    for(let i=0;i<this.running[0].page.length;i++){
                        if(this.running[0].page[i].page==Math.floor(this.callSwapPage*1/1024)){
                            callSwapPageIndex=i;//获取所输入逻辑地址对应的物理地址块在页表数组中的下标
                        }
                    }

                    if(callSwapPageIndex>=this.physicalMemory){
                        let tempArr = this.running[0].page;
                        this.running[0].page=[];

                        let tempPage1=tempArr[0];//最先进入内存的页
                        let tempPage2=tempArr[callSwapPageIndex];//需要进入内存的页

                        tempArr[0]=new PAGE(tempArr[0].page,tempPage2.piece,tempPage2.swap,tempPage2.exist);
                        tempArr[callSwapPageIndex]=new PAGE(tempArr[callSwapPageIndex].page,tempPage1.piece,tempPage1.swap,tempPage1.exist);

                        tempPage1=tempArr[0];
                        tempPage2=tempArr[callSwapPageIndex];

                        for(let i=0;i<this.physicalMemory-1;i++){
                            tempArr[i]=new PAGE(tempArr[i+1].page,tempArr[i+1].piece,tempArr[i+1].swap,tempArr[i+1].exist);
                        }
                        tempArr[this.physicalMemory-1]=new PAGE(tempPage2.page,tempPage2.piece,tempPage2.swap,tempPage2.exist);
                        tempArr[callSwapPageIndex]=new PAGE(tempPage1.page,tempPage1.piece,tempPage1.swap,tempPage1.exist);

                        this.running[0].page=tempArr;
                        tempArr=[];

                        this.inSwap++;
                    }else if(callSwapPageIndex>=0||callSwapPageIndex<this.physicalMemory){
                        this.inMemory++;
                    }

                }else{
                    alert("无进程块可交换")
                }

            },

            //添加设备
            addDevice(){
                let flag = this.findDCCById(this.DCCid,this.device);
                if(flag){
                    alert('该设备ID已存在');
                }else if(this.DCparent==''){
                    alert('父级控制器不能为空');
                }else if(!this.findDCCById(this.DCparent,this.control)){
                    alert('该父级控制器不存在');
                }else{
                    for(let i=0;i<this.control.length;i++){
                        if(this.control[i].id==this.DCparent){
                            let tmpDevice = new DEVICE(this.DCCid,this.control[i]);
                            this.device.push(tmpDevice);
                        }
                    }
                }
            },

            //删除设备
            delDevice(){
                let flag = this.findDCCById(this.DCCid,this.device);
                if(flag){
                    let tmpIndex=0;
                    for(let i=0;i<this.device.length;i++){
                        if(this.device[i].id==this.DCCid){
                            tmpIndex=i;
                        }
                    }
                    if(this.device[tmpIndex].isFree){
                        this.device.splice(tmpIndex,1);
                    }else{
                        alert('设备占用，不可删除')
                    }
                }else{
                    alert('该设备ID不存在');
                }

            },

            //添加控制器
            addControl(){
                let flag = this.findDCCById(this.DCCid,this.control);
                if(flag){
                    alert('该控制器ID已存在');
                }else if(this.DCparent==''){
                    alert('父级通道不能为空');
                }else if(!this.findDCCById(this.DCparent,this.channel)){
                    alert('该父级通道不存在');
                }else {
                    for (let i = 0; i < this.channel.length; i++) {
                        if (this.channel[i].id == this.DCparent) {
                            let tmpControl = new CONTROL(this.DCCid, this.channel[i]);
                            this.control.push(tmpControl);
                        }
                    }
                }
            },

            //删除控制器
            delControl(){
                if(this.findDCCById(this.DCCid,this.control)){
                    let flag = false;
                    for(let i=0;i<this.device.length;i++){
                        if(this.device[i].control.id==this.DCCid){
                            flag=true;
                        }
                    }
                    if(flag){
                        alert('该控制器有设备相连接，不可删除')
                    }else{
                        for(let i=0;i<this.control.length;i++){
                            if(this.control[i].id==this.DCCid){
                                this.control.splice(i,1);
                            }
                        }
                    }
                }else{
                    alert('该控制器ID不存在')
                }
            },

            //添加通道
            addChannel(){
                let flag = this.findDCCById(this.DCCid,this.channel);
                if(flag){
                    alert('该通道ID已存在');
                }else{
                    let tmpChannel = new CHANNEL(this.DCCid);
                    this.channel.push(tmpChannel);
                }
            },

            //删除通道
            delChannel(){
                if(this.findDCCById(this.DCCid,this.channel)){
                    let flag = false;
                    for(let i=0;i<this.control.length;i++){
                        if(this.control[i].channel.id==this.DCCid){
                            flag=true;
                        }
                    }
                    if(flag){
                        alert('该通道有控制器相连接，不可删除')
                    }else{
                        for(let i=0;i<this.channel.length;i++){
                            if(this.channel[i].id==this.DCCid){
                                this.channel.splice(i,1);
                            }
                        }
                    }
                }else{
                    alert('该通道ID不存在')
                }
            },

            //申请设备
            requestDevice(){
                if(this.running.length){
                    let tmpID = prompt("请输入设备ID:",'');
                    let flag = this.findDCCById(tmpID,this.device);
                    if(flag){
                        let tmpIndex=0;
                        for(let i=0;i<this.device.length;i++){
                            if(this.device[i].id==tmpID){
                                tmpIndex=i;
                            }
                        }
                        if(this.device[tmpIndex].isFree){
                            this.device[tmpIndex].isFree=!this.device[tmpIndex].isFree;
                            this.device[tmpIndex].process=this.running[0].name;
                            alert('成功申请'+this.device[tmpIndex].id);

                            for(let i=0;i<this.control.length;i++){
                                if(this.control[i].id==this.device[tmpIndex].control.id){
                                    //调用申请控制器函数
                                    this.requestControl(this.running[0],this.control[i]);
                                }
                            }
                        }else if(this.device[tmpIndex].process==this.running[0].name){
                            alert(this.device[tmpIndex].id+'正在被进程'+this.running[0].name+'使用');
                        }else{
                            alert(this.device[tmpIndex].id+'已被占用，已将进程'+this.running[0].name+'插入改设备等待队列');
                            this.device[tmpIndex].waiting.push(this.running[0]);
                            this.block();

                        }
                    }else{
                        alert("该设备ID不存在")
                    }
                }else{
                    alert('无运行进程')
                }
            },

            //释放设备
            releaseDevice(){
                if(this.running.length){
                    let tmpID = prompt("请输入设备ID:",'');
                    let flag = this.findDCCById(tmpID,this.device);
                    if(flag){
                        let tmpIndex=0;
                        for(let i=0;i<this.device.length;i++){
                            if(this.device[i].id==tmpID){
                                tmpIndex=i;
                            }
                        }
                        if(this.device[tmpIndex].process==this.running[0].name){
                            let PCBName = this.device[tmpIndex].process;
                            if(this.device[tmpIndex].waiting.length){
                                this.device[tmpIndex].process=this.device[tmpIndex].waiting[0].name;
                                this.processName = this.device[tmpIndex].waiting[0].name;
                                this.weakUp();
                                this.processName='';
                                let tmpProcess = this.device[tmpIndex].waiting[0];
                                this.device[tmpIndex].waiting.splice(0,1);
                                this.requestControl(tmpProcess,this.device[tmpIndex].control);
                            }else{
                                this.device[tmpIndex].isFree=true;
                                this.device[tmpIndex].process='';
                                alert('进程'+PCBName+'已释放'+this.device[tmpIndex].id);
                            }
                            this.releaseControl(PCBName,this.device[tmpIndex].control);
                        }else{
                            alert('运行进程未占用该设备');
                        }
                    }else{
                        alert('该设备ID不存在')
                    }
                }
            },

            //申请控制器
            requestControl(PCB,Control){
                if(Control.isFree){
                    Control.isFree=false;
                    Control.process=PCB.name;
                    alert('成功申请'+Control.id);
                    this.requestChannel(PCB,Control.channel);

                }else if(Control.process==PCB.name){
                    alert(Control.id+'正在被进程'+PCB.name+'使用');
                    this.requestChannel(PCB,Control.channel);
                }else{
                    alert(Control.id+'已被占用，已将进程'+PCB.name+'加入该控制器的等待队列');
                    Control.waiting.push(PCB);
                    this.block();
                }
            },

            //释放控制器
            releaseControl(PCBName,Control){
                if(Control.process==PCBName){
                    PCBName=Control.process;
                    if(Control.waiting.length){
                        Control.process=Control.waiting[0].name;
                        this.processName = Control.waiting[0].name;
                        this.weakUp();
                        this.processName='';
                        let tmpProcess=Control.waiting[0];
                        Control.waiting.splice(0,1);
                        this.requestChannel(tmpProcess,Control.channel);
                    }else{
                        Control.isFree=true;
                        Control.process='';
                        alert('进程'+PCBName+'已释放'+Control.id);
                    }
                    this.releaseChannel(PCBName,Control.channel);
                }else{
                    alert('运行进程未占用'+Control.id);
                }
            },

            //申请通道
            requestChannel(PCB,Channel){
                if(Channel.isFree){
                    Channel.isFree=false;
                    Channel.process=PCB.name;
                    alert('成功申请'+Channel.id);
                    this.block();
                }else if(Channel.process==PCB.name){
                    alert(Channel.id+'正在被进程'+PCB.name+'使用');
                }else{
                    alert(Channel.id+'已被占用，已将进程'+PCB.name+'加入该通道的等待队列');
                    Channel.waiting.push(PCB);
                    this.block();
                }
            },

            //释放通道
            releaseChannel(PCBName,Channel){
                if(Channel.process==PCBName){
                    if(Channel.waiting.length){
                        Channel.process=Channel.waiting[0].name;
                        this.processName = Channel.waiting[0].name;
                        this.weakUp();
                        this.processName='';

                    }else{
                        Channel.isFree=true;
                        Channel.process='';
                        alert('进程'+PCBName+'已释放'+Channel.id);
                    }
                    Channel.waiting.splice(0,1);
                }else{
                    alert('运行进程未占用'+Channel.id);
                }
            },

            //创建进程
            creat(){
                if(this.processName){
                    let flag=this.findProcess(this.ready,this.processName)&&this.findProcess(this.blocked,this.processName)&&this.findProcess(this.running,this.processName);
                    if (flag) {
                        let arrival_time = prompt("请输入到达时间");
                        let burst_time = prompt("请输入服务时间");
                        let PCBTemp = new PCB(this.processName,this.processSize*1,arrival_time*1,burst_time*1);
                        this.allPCB.push(PCBTemp);
                        this.ready.push(PCBTemp);
                        this.processName = '';
                        this.processSize = '';
                        if(this.running.length==0){
                            this.running.push(this.ready[0]);
                            this.saveToMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                            this.ready.splice(0,1);
                        }
                        this.resetPageFaultRate();
                    }else{
                        alert('该名称的进程已存在！')
                    }

                }else{
                    alert('进程名称不能为空！')
                }
            },

            //时间片到
            timeUp() {
                if(this.running.length!=0){
                    this.ready.push(this.running[0]);
                    //this.releaseMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                    this.running[0] = this.ready[0];
                    this.saveToMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                    this.ready.splice(0, 1);
                    this.resetPageFaultRate();
                }
            },

            //进程阻塞
            block(){
                this.blocked.push(this.running[0]);
                //this.releaseMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                //判断就绪队列是否还有进程
                if(this.ready.length!=0){
                    this.running[0]=this.ready[0];
                    this.saveToMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                    this.ready.splice(0,1);
                }else{
                    this.running.splice(0,1);
                    alert("无就绪进程,该操作会使CPU空闲")
                }
                this.resetPageFaultRate();
            },

            //唤醒进程
            weakUp(){
                let flag=this.findProcess(this.blocked,this.processName);
                if(flag){
                    alert('该进程不在阻塞队列,无法唤醒')
                }else{
                    let tempIndex;
                    for(let index=0;index<this.blocked.length;index++){
                        if(this.processName==this.blocked[index].name){
                            tempIndex=index;
                        }
                    }
                    this.ready.push(this.blocked[tempIndex]);
                    this.blocked.splice(tempIndex,1);
                    this.processName = '';
                    this.processSize = '';

                    //如果运行队列为空，把就绪首个进程添加到运行队列
                    if(this.running.length==0){
                        this.running.push(this.ready[0]);
                        this.saveToMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                        this.ready.splice(0,1);
                        this.resetPageFaultRate();
                    }
                }
            },

            //结束进程
            endUp(){
                if(this.running.length!=0){
                    this.releaseMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                    if(this.ready.length!=0){
                        this.running[0]=this.ready[0];
                        this.saveToMemory(this.running[0],this.memory,this.swapSpace,this.physicalMemory);
                        this.ready.splice(0,1);
                    }else{
                        this.running.splice(0,1);
                        alert("无就绪进程,该操作会使CPU空闲")
                    }
                    this.resetPageFaultRate();
                }else{
                    alert("无运行进程")
                }
            }
        }
    })

</script>
</body>
</html>