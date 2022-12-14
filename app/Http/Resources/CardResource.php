<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
      'id' => $this->id,
      'task_id' => $this->task_id,
      'title' => $this->title,
      'background' => $this->background,
      'description' => $this->description,
      'status' => $this->status,
      'dates' => $this->dates,
    ];
  }
}
