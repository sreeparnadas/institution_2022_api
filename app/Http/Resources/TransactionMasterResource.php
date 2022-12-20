<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TransactionMaster;
/**
 * @property mixed voucher_type_id
 * @property mixed transaction_number
 * @property mixed transaction_date
 * @property mixed comment
 * @property mixed id
 * @property mixed voucher_type
 * @property mixed transaction_details
 * @property mixed reference_transaction_master_id
 */
class TransactionMasterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
           "transactionNumber" =>$this->transaction_number,
           "transactionDate"=>$this->transaction_date,
            "referenceTransactionMasterId"=>$this->reference_transaction_master_id,
           "comment"=>$this->comment,
           "transactionMasterId"=>$this->id,
           "voucherType"=> new VoucherTypeResource($this->voucher_type), 
           "transactionDetailsDebit"=>TransactionDetailResource::collection($this->transaction_details_debit),
           "transactionDetailsCredit"=>TransactionDetailResource::collection($this->transaction_details_credit),
           "transactionDetails"=>TransactionDetailResource::collection($this->transaction_details)
           //"reletedTransactions"=>TransactionMaster::whereReferenceTransactionMasterId($this->id)->get()
        ];

    }
}
