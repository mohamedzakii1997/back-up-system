<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Video;
use App\User;
use Session;
use App\Image;
use Illuminate\Validation\Rule;
use Hash;
use Validator;
use File;
use App\Document;
use App\Audio;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(Request $request)
    {
        if(auth()->check()&&auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
        }elseif($request->has('token')){
            $validData=Validator::make($request->all(),['token'=>'required|alpha_num']);
            if(!$validData->fails()){
                $user=User::where('blockToken',$request->token)->first();
                if($user){
                    $user->block=0;
                    $user->blockToken=Null;
                    $user->save();
                    Session::flash('block','You UnBlocked Your Account Again. Enjoy');
                }else return redirect()->route('home');
            }
        }

         return view('home');
    }

    public function getImage($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $image=Image::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($image){
            return response()->download(storage_path('app/public/'.$image->path), null, [], null);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }
    public function getVideo($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Video=Video::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Video){
            return response()->download(storage_path('app/public/'.$Video->path), null, [], null);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function getAudio($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Audio=Audio::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Audio){
            return response()->download(storage_path('app/public/'.$Audio->path), null, [], null);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function block($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if(auth()->user()->role){
            $user=User::where('id',$id)->where('block','0')->firstOrFail();
            if($user->role) return redirect('/controll')->with(['custom-error'=>'You Can not Block Admin']);
            else{
                $user->block=1;
                $user->save();
                return redirect('/controll')->with(['message'=>'You Blocked '.$user->name.' Successfully']);
            }
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function free($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if(auth()->user()->role){
            $user=User::where('id',$id)->where('block','1')->firstOrFail();
            $user->block=0;
            $user->blockToken=NULL;
            $user->save();
            return redirect('/controll')->with(['message'=>'You Free '.$user->name.' Successfully']);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function editProfile(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|string|min:4|max:30',
                'email'=>['required','email','min:8','max:30','unique:users,email,'.auth()->user()->id]
            ]);
            auth()->user()->name=$request->name;
            auth()->user()->email=$request->email;
            auth()->user()->save();
            return redirect('/editProfile')->with(['message'=>'You Edit Your Profile Successfully']);
        }else{
            return view('editprofile');
        }
    }

    public function editPassword(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if($request->isMethod('post')){
            $request->validate([
                'current-password'=>'required',
                'new-password'=>'required|min:15|max:50|confirmed|alpha_num',
                'new-password_confirmation'=>'required'
            ]);
            if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
                // The passwords matches
                return redirect()->back()->with(["custom-error"=> "Your current password does not matches with the password you provided."]);
            }
            auth()->user()->password=bcrypt($request->get('new-password'));
            auth()->user()->save();
            return redirect('/editPassword')->with(['message'=>'You Edit Your Password Successfully']);
        }else{
            return view('editpassword');
        }
    }

    public function controll(){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if(auth()->user()->role){
            $users=User::where('role','0')->get();
            return view('controll',compact('users'));

        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function videos(){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }

        $videos=Video::where('user_id',auth()->user()->id)->get();
        return view('videos',compact('videos'));
    }
    public function audios(){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }

        $audios=Audio::where('user_id',auth()->user()->id)->get();
        return view('audios',compact('audios'));
    }

    public function images(){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $images=Image::where('user_id',auth()->user()->id)->get();
        return view('images',compact('images'));
    }

    public function documents(){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $documents=Document::where('user_id',auth()->user()->id)->get();
        return view('documents',compact('documents'));
    }

    public function uploadVideo(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $messages=['mimes'=>'Please Enter Valid Video'];
        $request->validate(['video'=>'required|file|mimes:mp4,ogx,oga,ogv,ogg,webm,mpeg|max:200000'],$messages);
        $path=Storage::disk('public')->putFileAs(auth()->user()->id.'/videos',$request->file('video'),$request->file('video')->getClientOriginalName());
        if(Video::where('user_id',auth()->user()->id)->where('path',$path)->count())
            return redirect('/videos')->with(['warning'=>'Your video Is Uploaded Before, Change the Name of The Video If You Want To Upload It Again']);
        else{
            $video= new Video;
            $video->path=$path;
            $video->user_id=auth()->user()->id;
            $video->save();
        }
        return redirect('/videos')->with(['message'=>'You Uploaded '.$request->file('video')->getClientOriginalName().' Successfully']);
        
    }

    public function uploadAudio(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $messages=['mimetypes'=>'Please Enter Valid Audio'];
        $request->validate(['audio'=>'required|file|mimetypes:audio/aiff,audio/x-aiff,audio/basic,audio/x-au,audio/make,audio/x-gsm,audio/mpeg,audio/mpeg3,audio/midi,audio/x-mid,audio/x-midi,audio/x-mpeg-3,audio/s3m,audio/x-psid,audio/tsplayer,audio/tsp-audio,audio/voc,audio/x-voc,audio/wav,audio/x-wav,audio/xm,audio/mid|max:20000'],$messages);
        $path=Storage::disk('public')->putFileAs(auth()->user()->id.'/audios',$request->file('audio'),$request->file('audio')->getClientOriginalName());
        if(Audio::where('user_id',auth()->user()->id)->where('path',$path)->count())
            return redirect('/audios')->with(['warning'=>'Your Audio Is Uploaded Before, Change the Name of The Audio If You Want To Upload It Again']);
        else{
            $Audio= new Audio;
            $Audio->path=$path;
            $Audio->user_id=auth()->user()->id;
            $Audio->save();
        }
        return redirect('/audios')->with(['message'=>'You Uploaded '.$request->file('audio')->getClientOriginalName().' Successfully']);
        
    }

    public function uploadImage(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $request->validate(['image'=>'required|file|image|max:20000']);
        $path=Storage::disk('public')->putFileAs(auth()->user()->id.'/images',$request->file('image'),$request->file('image')->getClientOriginalName());
        if(Image::where('user_id',auth()->user()->id)->where('path',$path)->count())
            return redirect('/getImages')->with(['warning'=>'Your Image Is Uploaded Before, Change the Name of The Image If You Want To Upload It Again']);
        else{
            $image= new Image;
            $image->path=$path;
            $image->user_id=auth()->user()->id;
            $image->save();
        }
        return redirect('/getImages')->with(['message'=>'You Uploaded '.$request->file('image')->getClientOriginalName().' Successfully']);
        
    }

    public function uploadDocument(Request $request){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $messages=['mimes'=>'Your File Mime Type Is Not Supported'];
        $request->validate(['document'=>'required|file|mimes:abw,arc,azw,bz,bz2,css,csv,doc,docx,html,ics,js,json,odp,ods,odt,pdf,ppt,pptx,rar,swf,tar,ts,vsd,xhtml,xls,xlsx,xml,zip,7z,abc,acgi,aip,asm,asp,c,c++,cc,cpp,def,etx,for,g,h,hh,htc,idc,jav,java,list,m,mar,pl,py,rt,sdml,text,txt|max:20000'],$messages);
        $path=Storage::disk('public')->putFileAs(auth()->user()->id.'/documents',$request->file('document'),$request->file('document')->getClientOriginalName());
        if(Document::where('user_id',auth()->user()->id)->where('path',$path)->count())
            return redirect('/documents')->with(['warning'=>'Your Document Is Uploaded Before, Change the Name of The Document If You Want To Upload It Again']);
        else{
            $Document= new Document;
            $Document->path=$path;
            $Document->user_id=auth()->user()->id;
            $Document->save();
        }
        return redirect('/documents')->with(['message'=>'You Uploaded '.$request->file('document')->getClientOriginalName().' Successfully']);
        
    }

    public function deleteVideo($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $video=Video::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($video){
            Storage::disk('public')->delete($video->path);
            $video->delete();
            return redirect('/videos')->with(['message'=>'Video Deleted Successfully']);

        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function deleteAudio($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Audio=Audio::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Audio){
            Storage::disk('public')->delete($Audio->path);
            $Audio->delete();
            return redirect('/audios')->with(['message'=>'Audio Deleted Successfully']);

        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function deleteUser($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        if(auth()->user()->role){
            $user=User::where('id',$id)->firstOrFail();

            if($user->role) return redirect('/controll')->with(['custom-error'=>'You Can not Delete Admin']);
            else{
                File::deleteDirectory(storage_path('app/public/'.$user->id));
                $user->delete();
                return redirect('/controll')->with(['message'=>'You Deleted User Successfully']);
            }
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function deleteImage($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Image=Image::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Image){
            Storage::disk('public')->delete($Image->path);
            $Image->delete();
            return redirect('/getImages')->with(['message'=>'Image Deleted Successfully']);

        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function deleteDocument($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Document=Document::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Document){
            Storage::disk('public')->delete($Document->path);
            $Document->delete();
            return redirect('/documents')->with(['message'=>'Document Deleted Successfully']);

        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }
    public function downloadVideo($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $video=Video::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($video){
            return Storage::disk('public')->download($video->path);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function downloadAudio($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Audio=Audio::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Audio){
            return Storage::disk('public')->download($Audio->path);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function downloadImage($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $image=Image::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($image){
            return Storage::disk('public')->download($image->path);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }

    public function downloadDocument($id){
        if(auth()->user()->block)
        {
            auth()->logout();
            Session::flash('block','You Block From the Site For Bad Practice');
            return redirect('/home');
        }
        $Document=Document::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($Document){
            return Storage::disk('public')->download($Document->path);
        }else{
            auth()->user()->block=1;
            auth()->user()->save();
            return redirect('/home');
        }
    }
}
