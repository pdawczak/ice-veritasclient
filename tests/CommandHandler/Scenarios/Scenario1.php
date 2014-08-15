<?php

namespace tests\CommandHandler\Scenarios;

use Guzzle\Tests\GuzzleTestCase;
use tests\CommandHandler\ApplicationScenarioInterface;

class Scenario1 extends GuzzleTestCase implements ApplicationScenarioInterface
{
    public function setupMockCommand($mock)
    {
        $this->setReturnValue($mock, 'getCourseId', 6572);
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

        $this->setReturnValue($mock, 'hasCourseApplication', true);
        $this->setReturnValue($mock, 'isEnglishFirstLanguage', true);

        $this->setReturnValue($mock, 'getSubjectInvolvementStatement', 'The critical writing element of the MA programme');
        $this->setReturnValue($mock, 'getSupplementaryInformationStatement',
            "I Developed my interest in English Literature in 1969 when during the Nigerian Civil War, Chinua Achebe's 'Things Fall Apart' was the only book available to me. I extensively self-taught on post colonial literature as well as African-American and Diaspora literature. "
        );
        $this->setReturnValue($mock, 'getHighestQualificationStatement',
            "Master of Arts, Creative and Critical Writing (Merit) University of Gloucestershire (2011)\nBachelor of Arts, Mass Communication (2.2)\nUniversity of Nigeria, Nsukka (1980)"
        );
        $this->setReturnValue($mock, 'getHighestQualificationStatement',
            "Master of Arts, Creative and Critical Writing (Merit) University of Gloucestershire (2011)\nBachelor of Arts, Mass Communication (2.2)\nUniversity of Nigeria, Nsukka (1980)"
        );
        return $mock;
    }

    public function getExpectedOutput()
    {
        $xml =
            <<<EOF
<?xml version="1.0"?>
<application>
  <course>6572</course>
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
    <highest_qualification>Master of Arts, Creative and Critical Writing (Merit) University of Gloucestershire (2011)
Bachelor of Arts, Mass Communication (2.2)
University of Nigeria, Nsukka (1980)</highest_qualification>
    <student_loan>n</student_loan>
    <supplementary_information>I Developed my interest in English Literature in 1969 when during the Nigerian Civil War, Chinua Achebe's 'Things Fall Apart' was the only book available to me. I extensively self-taught on post colonial literature as well as African-American and Diaspora literature. </supplementary_information>
    <english_first_language>1</english_first_language>
  </course_application>
  <bursary_application>
    <eligible>1</eligible>
    <previous_ice_study>1</previous_ice_study>
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