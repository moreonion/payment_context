<?php

namespace Drupal\payment_context;

/**
 * Interface that all payment contexts should implement.
 */
interface PaymentContextInterface {

  /**
   * Create a payment context from $payment->context_data.
   *
   * @param mixed $data
   *   The data as returned by from toContextData().
   *
   * @return object
   *   A payment context object.
   */
  public static function fromContextData($data);

  /**
   * Export into a data structure that can be saved in $payment->context_data.
   *
   * @return mixed
   *   Serializable data structure.
   */
  public function toContextData();

  /**
   * Get a value from the context.
   *
   * Returns the value that this context provides for $key or NULL if it does
   * not provide a value. Usually those values are used to pre-populate payment
   * forms.
   *
   * @param string $key
   *   A string key that we want to have a value for.
   *
   * @return mixed
   *   Any value.
   */
  public function value($key);

  /**
   * Redirect user in a to a given url.
   *
   * Parameters are the same as for drupal_goto()
   *
   * @param string $path
   *   Path as for drupal_goto().
   * @param array $options
   *   Options as for drupal_goto().
   */
  public function redirect($path, array $options = array());

  /**
   * Return the machine name for this payment context.
   *
   * This name is stored as $payment->context and used to load the context
   * when the payment is loaded.
   */
  public function name();

}
