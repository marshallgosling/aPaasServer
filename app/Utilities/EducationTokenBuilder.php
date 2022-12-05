<?php

namespace App\Utilities;

use App\Utilities\AccessToken2;
use App\Utilities\Service\Chat;
use App\Utilities\Service\Rtm;
use App\Utilities\Service\Education;

class EducationTokenBuilder
{
    /**
     * Build user room token.
     *
     * @param $appId The App ID issued to you by Agora. Apply for a new App ID from
     *     Agora Dashboard if it is missing from your kit. See Get an App ID.
     * @param $appCertificate Certificate of the application that you registered in
     *     the Agora Dashboard. See Get an App Certificate.
     * @param $roomUuid The room's id, must be unique.
     * @param $userUuid The user's id, must be unique.
     * @param $role The user's role, such as 0(invisible), 1(teacher), 2(student), 3(assistant), 4(observer) etc.
     * @param $expire represented by the number of seconds elapsed since now. If, for example, you want to access the
     *     Agora Service within 10 minutes after the token is generated, set expireTimestamp as 600(seconds).
     * @return The user room token.
     */
    public static function buildRoomUserToken($appId, $appCertificate, $roomUuid, $userUuid, $role, $expire)
    {
        $accessToken = new AccessToken2($appId, $appCertificate, $expire);

        $chatUserId = md5($userUuid);
        $serviceEducation = new Education($roomUuid, $userUuid, $role);
        $serviceEducation->addPrivilege($serviceEducation::PRIVILEGE_ROOM_USER, $expire);
        $accessToken->addService($serviceEducation);

        $serviceRtm = new Rtm($userUuid);
        $serviceRtm->addPrivilege($serviceRtm::PRIVILEGE_LOGIN, $expire);
        $accessToken->addService($serviceRtm);

        $serviceChat = new Chat($chatUserId);
        $serviceChat->addPrivilege($serviceChat::PRIVILEGE_USER, $expire);
        $accessToken->addService($serviceChat);

        return $accessToken->build();
    }

    /**
     * Build user individual token.
     *
     * @param $appId The App ID issued to you by Agora. Apply for a new App ID from
     *     Agora Dashboard if it is missing from your kit. See Get an App ID.
     * @param $appCertificate Certificate of the application that you registered in
     *     the Agora Dashboard. See Get an App Certificate.
     * @param $userUuid The user's id, must be unique.
     * @param $expire represented by the number of seconds elapsed since now. If, for example, you want to access the
     *     Agora Service within 10 minutes after the token is generated, set expireTimestamp as 600(seconds).
     * @return The build user individual token.
     */
    public static function buildUserToken($appId, $appCertificate, $userUuid, $expire)
    {
        $accessToken = new AccessToken2($appId, $appCertificate, $expire);
        $serviceEducation = new Education("", $userUuid);
        $serviceEducation->addPrivilege($serviceEducation::PRIVILEGE_USER, $expire);
        $accessToken->addService($serviceEducation);

        return $accessToken->build();
    }

    /**
     * Build app global token.
     *
     * @param $appId The App ID issued to you by Agora. Apply for a new App ID from
     *     Agora Dashboard if it is missing from your kit. See Get an App ID.
     * @param $appCertificate Certificate of the application that you registered in
     *     the Agora Dashboard. See Get an App Certificate.
     * @param $expire represented by the number of seconds elapsed since now. If, for example, you want to access the
     *     Agora Service within 10 minutes after the token is generated, set expireTimestamp as 600(seconds).
     * @return The app global token.
     */
    public static function buildAppToken($appId, $appCertificate, $expire)
    {
        $accessToken = new AccessToken2($appId, $appCertificate, $expire);
        $serviceEducation = new Education();
        $serviceEducation->addPrivilege($serviceEducation::PRIVILEGE_APP, $expire);
        $accessToken->addService($serviceEducation);

        return $accessToken->build();
    }
}
