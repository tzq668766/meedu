<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\ApiV1Exception;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;
use App\Http\Requests\Frontend\Member\MemberPasswordResetRequest;

class MemberController extends Controller
{
    /**
     * 密码修改.
     *
     * @param MemberRepository           $repository
     * @param MemberPasswordResetRequest $request
     *
     * @throws ApiV1Exception
     */
    public function passwordChangeHandler(MemberRepository $repository, MemberPasswordResetRequest $request)
    {
        [$oldPassword, $newPassword] = $request->filldata();
        if (! $repository->passwordChangeHandler($oldPassword, $newPassword)) {
            throw new ApiV1Exception($repository->errors);
        }
    }
}