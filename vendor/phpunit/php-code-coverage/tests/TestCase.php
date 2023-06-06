<?php
/*
<<<<<<< HEAD
 * This file is part of the php-code-coverage package.
=======
 * This file is part of the PHP_CodeCoverage package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
namespace SebastianBergmann\CodeCoverage;

use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Report\Xml\Coverage;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected static $TEST_TMP_PATH;

    public static function setUpBeforeClass(): void
    {
        self::$TEST_TMP_PATH = TEST_FILES_PATH . 'tmp';
    }

    protected function getXdebugDataForBankAccount()
    {
        return [
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
=======
/**
 * Abstract base class for test case classes.
 *
 * @since Class available since Release 1.0.0
 */
abstract class PHP_CodeCoverage_TestCase extends PHPUnit_Framework_TestCase
{
    protected function getXdebugDataForBankAccount()
    {
        return array(
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    8  => 1,
                    9  => -2,
                    13 => -1,
                    14 => -1,
                    15 => -1,
                    16 => -1,
                    18 => -1,
                    22 => -1,
                    24 => -1,
                    25 => -2,
                    29 => -1,
                    31 => -1,
                    32 => -2
<<<<<<< HEAD
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
=======
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    29 => 1,
<<<<<<< HEAD
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
=======
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    22 => 1,
<<<<<<< HEAD
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
=======
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    8  => 1,
                    13 => 1,
                    14 => 1,
                    15 => 1,
                    18 => 1,
                    22 => 1,
                    24 => 1,
                    29 => 1,
                    31 => 1,
<<<<<<< HEAD
                ]
            ]
        ];
    }

    protected function getCoverageForBankAccount(): CodeCoverage
    {
        $data = $this->getXdebugDataForBankAccount();

        $stub = $this->createMock(Driver::class);

=======
                )
            )
        );
    }

    protected function getCoverageForBankAccount()
    {
        $data = $this->getXdebugDataForBankAccount();

        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[0],
                $data[1],
                $data[2],
                $data[3]
            ));

<<<<<<< HEAD
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceIsInitiallyZero'),
=======
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            true
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(6, 9)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative')
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(27, 32)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative2')
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(20, 25)]
        );

        $coverage->start(
            new \BankAccountTest('testDepositWithdrawMoney')
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $coverage->start(
            new BankAccountTest('testDepositWithdrawMoney')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [
=======
            array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
<<<<<<< HEAD
            ]
=======
            )
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        return $coverage;
    }

<<<<<<< HEAD
    protected function getCoverageForBankAccountForFirstTwoTests(): CodeCoverage
    {
        $data = $this->getXdebugDataForBankAccount();

        $stub = $this->createMock(Driver::class);

=======
    protected function getCoverageForBankAccountForFirstTwoTests()
    {
        $data = $this->getXdebugDataForBankAccount();

        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[0],
                $data[1]
            ));

<<<<<<< HEAD
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceIsInitiallyZero'),
=======
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            true
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(6, 9)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative')
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(27, 32)]
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        return $coverage;
    }

    protected function getCoverageForBankAccountForLastTwoTests()
    {
        $data = $this->getXdebugDataForBankAccount();

<<<<<<< HEAD
        $stub = $this->createMock(Driver::class);

=======
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[2],
                $data[3]
            ));

<<<<<<< HEAD
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative2')
=======
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [TEST_FILES_PATH . 'BankAccount.php' => range(20, 25)]
        );

        $coverage->start(
            new \BankAccountTest('testDepositWithdrawMoney')
=======
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $coverage->start(
            new BankAccountTest('testDepositWithdrawMoney')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            [
=======
            array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
<<<<<<< HEAD
            ]
=======
            )
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        return $coverage;
    }

<<<<<<< HEAD
    protected function getExpectedDataArrayForBankAccount(): array
    {
        return [
            TEST_FILES_PATH . 'BankAccount.php' => [
                8 => [
                    0 => 'BankAccountTest::testBalanceIsInitiallyZero',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                9  => null,
                13 => [],
                14 => [],
                15 => [],
                16 => [],
                18 => [],
                22 => [
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                24 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ],
                25 => null,
                29 => [
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                31 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                32 => null
            ]
        ];
    }

    protected function getExpectedDataArrayForBankAccountInReverseOrder(): array
    {
        return [
            TEST_FILES_PATH . 'BankAccount.php' => [
                8 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                    1 => 'BankAccountTest::testBalanceIsInitiallyZero'
                ],
                9  => null,
                13 => [],
                14 => [],
                15 => [],
                16 => [],
                18 => [],
                22 => [
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                24 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ],
                25 => null,
                29 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                    1 => 'BankAccountTest::testBalanceCannotBecomeNegative'
                ],
                31 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                32 => null
            ]
        ];
    }

    protected function getCoverageForFileWithIgnoredLines(): CodeCoverage
    {
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'source_with_ignore.php');

        $coverage = new CodeCoverage(
            $this->setUpXdebugStubForFileWithIgnoredLines(),
            $filter
=======
    protected function getExpectedDataArrayForBankAccount()
    {
        return array(
            TEST_FILES_PATH . 'BankAccount.php' => array(
                8 => array(
                    0 => 'BankAccountTest::testBalanceIsInitiallyZero',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                9  => null,
                13 => array(),
                14 => array(),
                15 => array(),
                16 => array(),
                18 => array(),
                22 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                24 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ),
                25 => null,
                29 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                31 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                32 => null
            )
        );
    }

    protected function getCoverageForFileWithIgnoredLines()
    {
        $coverage = new PHP_CodeCoverage(
            $this->setUpXdebugStubForFileWithIgnoredLines(),
            new PHP_CodeCoverage_Filter
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->start('FileWithIgnoredLines', true);
        $coverage->stop();

        return $coverage;
    }

<<<<<<< HEAD
    protected function setUpXdebugStubForFileWithIgnoredLines(): Driver
    {
        $stub = $this->createMock(Driver::class);

        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                [
                    TEST_FILES_PATH . 'source_with_ignore.php' => [
=======
    protected function setUpXdebugStubForFileWithIgnoredLines()
    {
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_ignore.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        2 => 1,
                        4 => -1,
                        6 => -1,
                        7 => 1
<<<<<<< HEAD
                    ]
                ]
=======
                    )
                )
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            ));

        return $stub;
    }

<<<<<<< HEAD
    protected function getCoverageForClassWithAnonymousFunction(): CodeCoverage
    {
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php');

        $coverage = new CodeCoverage(
            $this->setUpXdebugStubForClassWithAnonymousFunction(),
            $filter
=======
    protected function getCoverageForClassWithAnonymousFunction()
    {
        $coverage = new PHP_CodeCoverage(
            $this->setUpXdebugStubForClassWithAnonymousFunction(),
            new PHP_CodeCoverage_Filter
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $coverage->start('ClassWithAnonymousFunction', true);
        $coverage->stop();

        return $coverage;
    }

<<<<<<< HEAD
    protected function setUpXdebugStubForClassWithAnonymousFunction(): Driver
    {
        $stub = $this->createMock(Driver::class);

        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                [
                    TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php' => [
=======
    protected function setUpXdebugStubForClassWithAnonymousFunction()
    {
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php' => array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        7  => 1,
                        9  => 1,
                        10 => -1,
                        11 => 1,
                        12 => 1,
                        13 => 1,
                        14 => 1,
                        17 => 1,
                        18 => 1
<<<<<<< HEAD
                    ]
                ]
=======
                    )
                )
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            ));

        return $stub;
    }
<<<<<<< HEAD

    protected function getCoverageForCrashParsing(): CodeCoverage
    {
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'Crash.php');

        // This is a file with invalid syntax, so it isn't executed.
        return new CodeCoverage(
            $this->setUpXdebugStubForCrashParsing(),
            $filter
        );
    }

    protected function setUpXdebugStubForCrashParsing(): Driver
    {
        $stub = $this->createMock(Driver::class);

        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue([]));
        return $stub;
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
