<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Cria uma campanha
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'nullable|string'
            ]);

            $campaign = Campaign::create([
                'user_id' => Auth::user()->id,
                'name' => $validatedData['name'],
                'description' => $validatedData['description'] ?? null
            ]);

            $campaignResponse = [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'description' => $campaign->description,
                'created_at' => date('Y-m-d H:i:s', strtotime($campaign->created_at))
            ];

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success creating campaign',
                'campaign' => $campaignResponse
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error creating campaign',
                'error' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Atualiza uma campanha
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'name' => 'nullable|string',
                'description' => 'nullable|string'
            ]);

            $campaign = Campaign::find($id);
            if (!$campaign) {
                throw new \Exception('Campaign not found', 404);
            }
            if (Auth::user()->id != $campaign->user_id && Auth::user()->type != 'admin') {
                throw new \Exception('No permission to update this campaign', 403);
            }

            $updateArray = [];
            foreach ($validatedData as $key => $value) {
                $updateArray += [$key => $value];
            }

            if (count($updateArray) > 0) {
                $campaign->update($updateArray);
            }

            $campaignResponse = [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'description' => $campaign->description,
                'created_at' => date('Y-m-d H:i:s', strtotime($campaign->created_at))
            ];

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success updating campaign',
                'campaign' => $campaignResponse
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error updating campaign';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }


    /**
     * Restaura uma campanha
     */
    public function restore($id)
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::onlyTrashed()->find($id);
            if (!$campaign) {
                throw new \Exception('Campaign deleted not found', 404);
            }
            if (Auth::user()->id != $campaign->user_id && Auth::user()->type != 'admin') {
                throw new \Exception('No permission to restore this campaign', 403);
            }

            $campaign->restore();

            $campaignResponse = [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'description' => $campaign->description,
                'created_at' => date('Y-m-d H:i:s', strtotime($campaign->created_at))
            ];


            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success restoring campaign',
                'campaign' => $campaignResponse
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error restoring campaign';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }


    /**
     * Deleta uma campanha
     */
    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::find($id);
            if (!$campaign) {
                throw new \Exception('Campaign not found', 404);
            }
            if (Auth::user()->id != $campaign->user_id && Auth::user()->type != 'admin') {
                throw new \Exception('No permission to consult this campaign', 403);
            }

            $campaignResponse = [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'description' => $campaign->description,
                'created_at' => date('Y-m-d H:i:s', strtotime($campaign->created_at))
            ];

            $campaign->delete();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success deleting campaign',
                'campaign' => $campaignResponse
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error deleting campaign';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }


    /**
     * Busca uma campanha
     */
    public function show($id)
    {
        try {
            $campaign = Campaign::find($id);
            if (!$campaign) {
                throw new \Exception('Campaign not found', 404);
            }
            if (Auth::user()->id != $campaign->user_id && Auth::user()->type != 'admin') {
                throw new \Exception('No permission to consult this campaign', 403);
            }

            $campaignResponse = [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'description' => $campaign->description,
                'created_at' => date('Y-m-d H:i:s', strtotime($campaign->created_at))
            ];

            return response()->json([
                'success' => true,
                'message' => 'Success consulting campaign',
                'campaign' => $campaignResponse
            ], 200);
        } catch (\Throwable $th) {
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error consulting campaign';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }
}
