<?php

namespace App\Libraries;

class RetsQuery
{
  public static function properties($object, $objectType, $query)
  {
    $config = new \PHRETS\Configuration;

		$config->setLoginUrl(env('RETS_LOGIN_URL'))
  		->setUsername(env('RETS_USERNAME'))
  		->setPassword(env('RETS_PASSWORD'))
  		->setRetsVersion(env('RETS_VERSION'));

		$rets = new \PHRETS\Session($config);

		$connect = $rets->Login();

      try {
        $results = $rets->Search($object, $objectType, $query, [
          'QueryType' => 'DMQL2',
          'Count' => 1, // count and records
          'Format' => 'COMPACT-DECODED',
          'Limit' => env('RETS_PULL'),
          'StandardNames' => 0, // give system names
        ]);
      } catch (Exception $e) {
        Bugsnag::notifyException($e);
      } catch (PHRETS\Exceptions\CapabilityUnavailable $e) {
        Bugsnag::notifyException($e);
      }

      $rets->Disconnect();

      return $results;
    }

    public static function photos($objectType, $objectSelect, $MLSNumber)
    {
        $config = new \PHRETS\Configuration;

		$config->setLoginUrl(env('RETS_LOGIN_URL'))
			->setUsername(env('RETS_USERNAME'))
			->setPassword(env('RETS_PASSWORD'))
			->setRetsVersion(env('RETS_VERSION'));

		$rets = new \PHRETS\Session($config);

		$connect = $rets->Login();

        try {
            $photos = $rets->GetObject($objectType, $objectSelect, $MLSNumber);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
        } catch (PHRETS\Exceptions\CapabilityUnavailable $e) {
            Bugsnag::notifyException($e);
        }

        $rets->Disconnect();

        return $photos;
    }
}
