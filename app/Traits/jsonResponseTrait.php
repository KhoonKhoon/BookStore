<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;


trait jsonResponseTrait
{
    private function _privateAlert($response, $success_message = null, $redirectUrl = null) {
        if($response['status'] == 'error') {
              request()->session()->flash('error', 'Error occurred while adding task');
        }

        if ($response['status'] == 'success') {
            request()->session()->flash('success', $success_message);
        }
    }

    private function _privateResponse($response, $success_message = null, $redirectUrl = null): JsonResponse {
        if($response['status'] == 'error') {
            return jsonResponse(
                'error',
                ''
            );
        }

        if ($response['status'] == 'info') {
            return jsonResponse(
                'info',
                ''
            );
        }

        return jsonResponse(
            'success',
            $success_message,
            $redirectUrl ?? url()->previous()
        );
    }
}
