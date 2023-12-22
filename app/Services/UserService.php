<?php

namespace App\Services;

use App\FileUpload\FileUpload;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    /**
     * get all user
     *
     * @return collection
     */
    public function getAllUsers()
    {
        $users = User::paginate(5);
        return $users;
    }

    /**
     * store user
     */
    public function store($request)
    {
        dd($request);
        try {
            DB::beginTransaction();
                User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'status' => $request['status']
            ]);
            DB::commit();
            Cache::flush();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }
    }

    /**
     * update user
     */
    public function update($data, $user)
    {
        try {
            DB::beginTransaction();
            $user_param = [
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => $data['status']
            ];

            if ( $data['password'] ) {
                $user_param['password'] = Hash::make($data['password']);
            }

            $user->update($user_param);
            DB::commit();
            Cache::flush();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }
    }

    /**
     * delete user
     */
    public function delete($user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            Cache::flush();

            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error'];
        }
    }

    public function change($request, $user)
    {
        try {
            DB::beginTransaction();

            $user_param = [
                'username' => $request['username'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],
            ];

            if ( $request['password'] ) {
                $user_param['password'] = Hash::make($request['password']);
            }

            $user->update($user_param);

            $disk = "tms_production";
            if(env('APP_ENV') == 'local') {
                $disk = 'tms_local';
            }
            if(request()->has('photo')) {
                $file = request('photo');
                $original_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $upload_file = new FileUpload();
                $full_path = $upload_file->fileUpload($file, "tms", "user");
                $file_extension = $file->extension();
                File::create(
                        [
                            'main_module' => 'user_profile',
                            'app_id' => $user->id,
                            'file_driver' => $disk,
                            'file_path' => $full_path,
                            'file_field' => '',
                            'original_name' => $original_name,
                            'file_extension' => $file_extension,
                        ]
                    );
                }

            DB::commit();
            Cache::flush();
            return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error', 'message' => 'something went wrong'];
        }
    }

    public function userStatus($user)
    {
        try {
            if ($user->status === 'inactive') {
               User::findOrFail($user->id)
                              ->update([
                                 'status' => 'active',
                              ]);
            }else{
                User::findOrFail($user->id)
                        ->update([
                            'status' => 'inactive',
                        ]);
            }

            return ['status' => 'success'];
         } catch (\Throwable $th) {
            return ['status' => 'error'];
         }
    }
}
