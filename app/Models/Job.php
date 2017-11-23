<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use Searchable, RecordsActivity;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(JobCompany::class, 'job_company_id', 'id');
    }
}
