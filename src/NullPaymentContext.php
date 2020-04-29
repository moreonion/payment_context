<?php

namespace Drupal\payment_context;

/**
 * Default payment context.
 *
 * This payment context provides default behavior that can be safely assumed
 * from any context. If no other context object is explicitly set an instance
 * of this class is put as $payment->contextObj.
 */
class NullPaymentContext implements PaymentContextInterface {

  /**
   * Create an new instance.
   *
   * The NullPaymentContext doesn’t have any state so all instance are the same.
   */
  public static function fromContextData($data) {
    return new static();
  }

  /**
   * Return data needed for serialization.
   *
   * No data is needed as a NullPaymentContext doesn’t have a state.
   */
  public function toContextData() {
    return [];
  }

  /**
   * Return the context name.
   */
  public function name() {
    return 'null';
  }

  /**
   * Return a value for a key.
   *
   * This always returns NULL.
   */
  public function value($key) {
    return NULL;
  }

  /**
   * Redirect the user to another page.
   */
  public function redirect($path, array $options = []) {
    drupal_goto($path, $options);
  }

}
