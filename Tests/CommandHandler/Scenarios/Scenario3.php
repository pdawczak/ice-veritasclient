<?php

namespace Ice\VeritasClientBundle\Tests\CommandHandler\Scenarios;

use Guzzle\Tests\GuzzleTestCase;
use Ice\VeritasClientBundle\Tests\CommandHandler\ApplicationScenarioInterface;

class Scenario3 extends GuzzleTestCase implements ApplicationScenarioInterface
{
    public function setupMockCommand($mock)
    {
        $this->setReturnValue($mock, 'getCourseId', 13852);
        $this->setReturnValue($mock, 'getUsername', 'rh1');
        $this->setReturnValue($mock, 'getApplicantTitle', 'Mr');
        $this->setReturnValue($mock, 'getApplicantFirstNames', 'Rob');
        $this->setReturnValue($mock, 'getApplicantLastName', 'Hogan');
        $this->setReturnValue($mock, 'getApplicantEmailAddress', 'rh389@cam.ac.uk');
        $this->setReturnValue($mock, 'getApplicantDateOfBirth', new \DateTime('1986-10-10', new \DateTimeZone('UTC')));
        $this->setReturnValue($mock, 'getApplicantPhone', '123');
        $this->setReturnValue($mock, 'getApplicantAddressLine1', 'Address line 1');
        $this->setReturnValue($mock, 'getApplicantAddressLine2', 'Address line 2');
        $this->setReturnValue($mock, 'getApplicantAddressLine3', 'Address line 3');
        $this->setReturnValue($mock, 'getApplicantAddressTown', 'Town');
        $this->setReturnValue($mock, 'getApplicantAddressPostcode', 'AB1 CD2');
        $this->setReturnValue($mock, 'getApplicantAddressCounty', 'County');
        $this->setReturnValue($mock, 'getApplicantAddressCountry', 'Country');
        $this->setReturnValue($mock, 'getApplicantMarketingOptIn', true);

        $this->setReturnValue($mock, 'hasBursaryApplication', true);
        $this->setReturnValue($mock, 'hasCambridgeUniversityPressBursaryPart', true);
        $this->setReturnValue($mock, 'hasJamesStewartBursaryPart', true);
        $this->setReturnValue($mock, 'hasPreviouslyStudiedWithIce', true);
        $this->setReturnValue($mock, 'hasTaughtInUkSchool', false);
        $this->setReturnValue($mock, 'hasIvyRoseHoodBursaryPart', true);
        $this->setReturnValue($mock, 'hasPreviouslyStudiedAtUniversity', false);
        $this->setReturnValue($mock, 'getIvyRoseHoodStatement', 'Awesomeness');
        $this->setReturnValue($mock, 'getPersonalStatement', 'Personal');
        $this->setReturnValue($mock, 'getCppaEssay', 'CPPA');

        $this->setReturnValue($mock, 'hasCourseApplication', true);
        $this->setReturnValue($mock, 'getSubjectInvolvementStatement', 'The critical writing element of the MA programme');
        $this->setReturnValue($mock, 'hasTakenIelts', true);
        $this->setReturnValue($mock, 'getIeltsTrfNumber', '123');
        $this->setReturnValue($mock, 'getSubjectInvolvementStatement', 'The critical writing element of the MA programme');
        return $mock;
    }

    public function getExpectedOutput()
    {
        $xml =
            <<<EOF
<?xml version="1.0"?>
<application>
  <course>13852</course>
  <username>rh1</username>
  <student_details>
    <title>Mr</title>
    <first_name>Rob</first_name>
    <last_name>Hogan</last_name>
    <dob>1986-10-10</dob>
    <phone>123</phone>
    <email>rh389@cam.ac.uk</email>
    <line1>Address line 1</line1>
    <line2>Address line 2</line2>
    <line3>Address line 3</line3>
    <town>Town</town>
    <postcode>AB1 CD2</postcode>
    <county>County</county>
    <country>Country</country>
    <marketing_opt_in>1</marketing_opt_in>
  </student_details>
  <course_application>
    <statement>The critical writing element of the MA programme</statement>
    <student_loan>n</student_loan>
    <personal_statement>Personal</personal_statement>
    <cppa_essay>CPPA</cppa_essay>
    <english_first_language>0</english_first_language>
    <english_language_number_type>ielts</english_language_number_type>
    <english_language_number>123</english_language_number>
  </course_application>
  <bursary_application>
    <eligible>1</eligible>
    <previous_ice_study>1</previous_ice_study>
    <previous_uni_study>0</previous_uni_study>
    <how_eligible>Awesomeness</how_eligible>
    <uk_school>0</uk_school>
  </bursary_application>
</application>
EOF;
        return $xml;
    }

    private function setReturnValue($mockObject, $method, $value)
    {
        $mockObject->expects($this->any())->method($method)->will($this->returnValue($value));
    }
}