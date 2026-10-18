<?php

namespace App\Http\Controllers;

use App\Concerns\ControllerTrait;
use App\Http\Requests\GeneralRequest;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    use ControllerTrait;

    public function __construct(ContactMessage $model)
    {
        $this->model = $model::getModel();
    }

    /**
     * Inbox is read-only: messages only arrive from the public contact form.
     */
    public function getDetail(GeneralRequest $request, $id)
    {
        $record = $this->model->findOrFail($id);

        return $this->views($this->template('show'), [
            'model' => $record,
        ]);
    }

    public function getCreate(GeneralRequest $request)
    {
        return redirect()->action([self::class, 'getTable']);
    }

    public function postCreate(GeneralRequest $request)
    {
        return redirect()->action([self::class, 'getTable']);
    }

    public function getUpdate(GeneralRequest $request, $id)
    {
        return redirect()->action([self::class, 'getTable']);
    }

    public function postUpdate(GeneralRequest $request, $id)
    {
        return redirect()->action([self::class, 'getTable']);
    }
}
