<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Http\Requests\CoverLetterRequest;
use App\Http\Requests\PublicComplaintRequest;
use App\Http\Requests\DifferentDataRequest;
use App\Http\Requests\BusinessInfoRequest;
use App\Http\Requests\MailPoorRequest;
use App\Http\Requests\UserListRequest;
use App\Models\Certificate;
use App\Models\CoverLetter;
use App\Models\DifferentData;
use App\Models\PublicComplaint;
use App\Models\BusinessInfo;
use App\Models\MailPoor;
use App\Models\UserList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $public_complaint, $certificate, $cover_letter, $different_data, $mail_poor, $business_info, $user_list;

    public function __construct()
    {
        $this->public_complaint = new PublicComplaint();
        $this->certificate = new Certificate();
        $this->cover_letter = new CoverLetter();
        $this->different_data = new DifferentData();
        $this->mail_poor = new MailPoor();
        $this->business_info = new BusinessInfo();
        $this->user_list = new UserList();
    }

    public function publicComplaint(PublicComplaintRequest $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan pengaduan',
            'data' => $this->public_complaint->create($request->validated())
        ], 201);
    }

    public function userList(UserListRequest $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan pengaduan',
            'data' => $this->user_list->create($request->validated())
        ], 201);
    }

    public function certificate(CertificateRequest $request)
    {
        $data = $request->validated();
        $data['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan permohonan',
            'data' => $this->certificate->create($data)
        ], 201);
    }

    public function coverLetter(CoverLetterRequest $request)
    {
        $data = $request->validated();
        $data['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
        $data['valid_from'] = Carbon::parse($request->valid_from)->format('Y-m-d');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan permohonan',
            'data' => $this->cover_letter->create($data)
        ], 201);
    }

    public function differentData(DifferentDataRequest $request)
    {
        $data = $request->validated();
        $data['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan permohonan',
            'data' => $this->different_data->create($data)
        ], 201);
    }

    public function mailPoor(MailPoorRequest $request)
    {
        $data = $request->validated();
        $data['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan permohonan',
            'data' => $this->mail_poor->create($data)
        ], 201);
    }

    public function businessInfo(BusinessInfoRequest $request)
    {
        $data = $request->validated();
        $data['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan permohonan',
            'data' => $this->business_info->create($data)
        ], 201);
    }

}
